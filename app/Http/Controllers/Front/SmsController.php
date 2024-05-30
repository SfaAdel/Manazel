<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendVerificationCode($phoneNumber, $verificationCode)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $token);

        $message = $client->messages->create(
            $phoneNumber, // Destination phone number
            [
                'from' => $twilioNumber,
                'body' => "Your verification code is: $verificationCode"
            ]
        );

        return $message->sid;
    }

public function verifyCode(Request $request){
    $request->validate([
        'phone_number' => 'required|string|max:15',
        'verification_code' => 'required|integer',
    ]);

    $user = User::where('phone_number', $request->phone_number)->first();

    if ($user && $user->verification_code == $request->verification_code) {
        // Verification successful
        $user->phone_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Phone number verified successfully.']);
    }

    return response()->json(['message' => 'Invalid verification code.'], 422);
}

}
