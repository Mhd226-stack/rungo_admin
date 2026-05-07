<?php

namespace App\Jobs\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\Notifications\BaseNotification;

class FcmPushNotification extends BaseNotification implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    protected $title;
    protected $body;
    protected $device_token;

    public function __construct($title, $body, $device_token = null)
    {
        $this->title = $title;
        $this->body = $body['result'];
        $this->device_token = $device_token;
    }

    public function handle()
    {
        try {
            if (empty($this->device_token)) {
                return;
            }

            $tokens = is_array($this->device_token)
                ? $this->device_token
                : [$this->device_token];

            $tokens = array_filter($tokens);
            if (empty($tokens)) {
                return;
            }

            $serviceAccountPath = storage_path('app/firebase-service-account.json');

            $credentials = \Google\Auth\ApplicationDefaultCredentials::getCredentials(
                'https://www.googleapis.com/auth/firebase.messaging',
                null,
                null,
                $serviceAccountPath
            );
            $token = $credentials->fetchAuthToken();
            $accessToken = $token['access_token'];

            $projectId = env('FIREBASE_PROJECT_ID');

            foreach ($tokens as $deviceToken) {
                $message = [
                    'message' => [
                        'token' => $deviceToken,
                        'data' => [
                            'message' => json_encode((object)$this->body),
                            'title'   => $this->title,
                        ],
                        'android' => [
                            'priority' => 'high',
                        ],
                    ]
                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send");
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . $accessToken,
                    'Content-Type: application/json',
                ]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
                $result = curl_exec($ch);
                curl_close($ch);
            }

            return true;

        } catch (\Exception $e) {
            \Log::error('FCM Error: ' . $e->getMessage());
        }
    }  
}      