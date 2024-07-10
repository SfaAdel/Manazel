<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Models\Customer;
use App\Notifications\SendVerificationCode;
use App\Notifications\SendVerifySMS;
use App\Providers\RouteServiceProvider;
use App\Services\Vonage as ServicesVonage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Facades\Vonage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;
use Vonage\Client\Credentials\Basic as VonageCredentials;
use Vonage\SMS\Message\SentSMS;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function loginForm(): View
    {
        return view('front.auth.login');
    }

    public function verifyForm(): View
    {
        return view('front.auth.Verification');
    }

    public function login(LoginRequest $request)
    {
            // Log the customer in
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
        // return view('front.auth.login');
        return redirect()->route('home');

    }


    public function register(Request $request)
    {
        // Validate phone number
        $request->validate([
            'phone' => ['required', 'regex:/^05[0-9]{8}$/'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Check if phone already exists
        if (Customer::where('phone', $request->phone)->exists()) {
            throw ValidationException::withMessages([
                'phone' => 'هذا الرقم موجود بالفعل',
            ]);
        }

        // Create a new customer entry
        $customer = new Customer();
        $customer->phone = $request->phone;
        $customer->name = $request->name;
        $customer->p = $request->password;
        $customer->password = bcrypt($request->password);
        $customer->generateOTP();
        $customer->save();

        // Send OTP to SMS using provider
        if (config('verification.otp_provider') == 'vonage') {
            (new \App\Services\Vonage())->send($customer);
        }

        // Return view for OTP verification
        return redirect()->route('verify_code', ['phone' => $request->phone])->with('success', 'تم ارسال رمز التحقق الى رقم الهاتف الخاص بك');
    }

    /**
     * Display the OTP verification form.
     */

    /**
     * Handle OTP verification.
     */
    public function verify(Request $request)
    {
        // Validate phone and OTP
        $request->validate([
            // 'phone' => ['required', 'regex:/^\+9665[0-9]{8}$/'],
            'otp' => ['required'],
        ]);

        // Check if phone exists in database
        $customer = Customer::where('phone', $request->phone)->first();

        // If not exists -> throw validation error
        if (!$customer) {
            throw ValidationException::withMessages([
                'phone' => trans('auth.failed'),
            ]);
        }

         // Verify OTP
         if ($customer->otp == $request->otp) {
            if (now() < $customer->otp_till) {
                $customer->resetOTP();
                Auth::guard('customer')->login($customer);
                $request->session()->regenerate();
                return redirect()->route('home');
            } else {
                return back()->withErrors(['otp' => 'انتهت صلاحية هذا الرمز']);
            }
        } else {
            return back()->withErrors(['otp' => ' الرمز الذي ادخلته غير صحيح']);

        }
    }










}
