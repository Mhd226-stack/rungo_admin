<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class EmailOtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $otp = rand(100000, 999999);
        Cache::put('otp_' . $request->email, $otp, now()->addMinutes(10));
        Mail::raw("Votre code OTP Rungo : $otp", function($m) use ($request) {
            $m->to($request->email)->subject('Code OTP Rungo');
        });
        return response()->json(['success' => true]);
    }

    public function validateOtp(Request $request)
    {
        $request->validate(['email' => 'required|email', 'otp' => 'required']);
        $cached = Cache::get('otp_' . $request->email);
        if ($cached && $cached == $request->otp) {
            Cache::forget('otp_' . $request->email);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Code invalide']);
    }
}