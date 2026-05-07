<?php

namespace App\Jobs\Notifications;

use Illuminate\Mail\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs\Notifications\AndroidPushNotification;
use Illuminate\Support\Facades\Log;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable,Queueable,InteractsWithQueue,SerializesModels;

    /**
     * The User.
     *
     * @var user
     */
    protected $user;
    /**
     * The title.
     *
     * @var title
     */
    protected $title;
    /**
    * The body.
    *
    * @var body
    */
    protected $body;
    /**
    * The image.
    *
    * @var image
    */
    protected $image;
    /**
    * The data.
    *
    * @var data
    */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param $title,$body,$image,$data
     */
    public function __construct($user,$title, $body, $data=null, $image=null)
    {
        $this->user = $user;
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $deviceToken = $this->user->fcm_token;

            if (empty($deviceToken)) {
                Log::warning('FCM: No token for user ' . $this->user->id);
                return;
            }

            $serviceAccountPath = storage_path('app/firebase-service-account.json');
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $serviceAccountPath);
            $credentials = \Google\Auth\ApplicationDefaultCredentials::getCredentials(
            'https://www.googleapis.com/auth/firebase.messaging'
          );
           $token = $credentials->fetchAuthToken();
           $accessToken = $token['access_token'];
            $projectId = env('FIREBASE_PROJECT_ID');

            $message = [
                'message' => [
                    'token' => $deviceToken,
                    'notification' => [
                        'title' => $this->title,
                        'body'  => $this->body,
                    ],
                    'android' => ['priority' => 'high'],
                ]
            ];

            if ($this->image) {
                $message['message']['notification']['image'] = $this->image;
            }

            if ($this->data) {
                $message['message']['data'] = array_map('strval', (array)$this->data);
            }

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

            Log::info('FCM Result: ' . $result);

        } catch (\Exception $e) {
            Log::error('FCM Error: ' . $e->getMessage());
        }
    }
}