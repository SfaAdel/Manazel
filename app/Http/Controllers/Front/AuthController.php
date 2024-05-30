<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginForm(): View
    {
        return view('front.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return view('front.index');
    }

    public function registerForm(): View
    {
        return view('front.auth.register');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('front.index');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:customers'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $verificationCode = Str::random(6); // Generate 6-digit random code

        $user = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
            // Generate verification code
            $verificationCode = rand(100000, 999999);

            // Save the verification code (you may want to store this in the database associated with the user)
            $user->verification_code = $verificationCode;
            $user->save();

            // Send the verification code via SMS
            $smsController = new SmsController();
            $smsController->sendVerificationCode($user->phone_number, $verificationCode);


        return redirect()->route('verification.form')->with('message', 'Verification code sent to your phone.');
    }

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
    // private function sendVerificationCode($to, $code)
    // {
    //     try {
    //         $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

    //         $twilio->messages->create(
    //             $to,
    //             [
    //                 'from' => env('TWILIO_PHONE_NUMBER'),
    //                 'body' => "Your verification code is: $code"
    //             ]
    //         );

    //         Log::info("SMS sent to $to with code $code");
    //     } catch (\Exception $e) {
    //         Log::error("Failed to send SMS: " . $e->getMessage());
    //     }
    // }

    // public function verifyCode(Request $request)
    // {
    //     $request->validate([
    //         'phone' => 'required|string',
    //         'verification_code' => 'required|string',
    //     ]);

    //     $user = Customer::where('phone', $request->phone)->first();

    //     if (!$user || $user->verification_code !== $request->verification_code) {
    //         return redirect()->back()->withErrors(['verification_code' => 'Invalid verification code.']);
    //     }

    //     Auth::guard('customer')->login($user);

    //     return redirect()->route('login')->with('message', 'Registration successful.');
    // }
}
