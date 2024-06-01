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

        return redirect()->route('home');
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
        return view('front.auth.login');
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

        $user = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Generate and store verification code
        $verificationCode = rand(100000, 999999);
        $user->verification_code = $verificationCode;
        $user->save();

        // Send verification code via SMS
        try {
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
            $message = $twilio->messages->create($user->phone, [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => "Your verification code is: $verificationCode",
            ]);
            Log::info("Twilio message sent: " . $message->sid);
        } catch (\Twilio\Exceptions\RestException $e) {
            Log::error("Twilio SMS failed: " . $e->getMessage());
            return redirect()->back()->withErrors(['phone' => 'Failed to send verification code. Please ensure your phone number is correct and try again.'])->withInput();
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('login')->with('message', 'Verification code sent to your phone.');
    }


    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        $user = Auth::user();

        if ($user->verification_code === $request->code) {
            $user->verification_code = null;
            // $user->save();

            return redirect()->route('home')->with('message', 'Your phone number has been verified.');
        }

        return redirect()->back()->withErrors(['code' => 'Invalid verification code.']);
    }

    // public function sendVerificationCode($phoneNumber, $verificationCode)
    // {
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilioNumber = env('TWILIO_PHONE_NUMBER');

    //     $client = new Client($sid, $token);

    //     $message = $client->messages->create(
    //         $phoneNumber, // Destination phone number
    //         [
    //             'from' => $twilioNumber,
    //             'body' => "Your verification code is: $verificationCode"
    //         ]
    //     );

    //     return $message->sid;
    // }
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
