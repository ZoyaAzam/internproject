<?php

namespace App\Http\Controllers;
use App\Services\TwilioService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use App\Models\User;

class TwilioServiceController extends Controller
{
    //

    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function WhatsappForm()
    {
        return view('auth.passwordsviaphone.OtpViaWhatsapp');
    }
    public function ChooseService()
    {
        return view('auth.passwordsviaphone.ChooseService');
    }
    public function SendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'region' => 'required',
        ]);

        $phone = $request->input('phone');
        $region = $request->input('region');

        // Validate phone number with dynamic region code
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $phoneNumberProto = $phoneUtil->parse($phone, $region);
            $isValid = $phoneUtil->isValidNumber($phoneNumberProto);

            if ($isValid) {
                $formattedPhone = $phoneUtil->format($phoneNumberProto, PhoneNumberFormat::E164);
                // In real-world scenarios, you would send this OTP via an SMS service

                $user = User::where('phone', $formattedPhone)->first();
                $otp = rand(100000, 999999);
                // dd($user->phone);
                // Save OTP to user or a separate table with an expiry time
                $user->otp = $otp;
                $user->otp_expires_at = now()->addMinutes(10);
                $user->save();
                 $to = '+971555313488';
                // Send OTP using SMS service
                $this->twilioService->sendOtp($to, $otp);               
                // Redirect to OTP verification form
                $request->session()->put('phone', $formattedPhone);
                $request->session()->put('phone_verify', true);
                return redirect()->route('password.request.via.whatsapp')->with('message','OTP sent successfully. OTP is valid for ten minutes' .$otp);;
            } else {
                return back()->withErrors(['phone' => 'Invalid phone number']);
            }
        } catch (\libphonenumber\NumberParseException $e) {
            return back()->withErrors(['phone' => 'Invalid phone number']);
        }
    }
    public function resendOtp()
    {
        $newotp = rand(100000, 999999);
        $phone=  session('phone');
        $user = User::where('phone', $phone)->first();
        $user->otp = $newotp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->update();
        return redirect()->route('password.request.via.whatsapp')->with(['message' => 'OTP has been resent.'], 200);;
    }
    public function verifyOtp(Request $request)
    {
                
        $request->validate([
          'otp' => 'required|array|min:3|max:3',
            'otp.*' => 'required|string|size:2',
        ]);
        $phone=  session('phone');
        $user = User::where('phone', $phone)->first();
        $otp = implode('', $request->input('otp'));
        if ($user->otp == $otp ) {
            if( $user->otp_expires_at >= now())
            {
            // OTP is correct, mark OTP as verified
            $request->session()->put('otp_verified', true);
            // Redirect to the password reset form
            return redirect()->route('password.request.via.whatsapp');
           } else
           {
            return back()->withErrors(['otp' => 'Time expired. ']);
           }
           }else {
            return back()->withErrors(['otp' => 'Invalid OTP']);

        }
    }
    public function updatePassword(Request $request)
    { 

        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Assuming the user is authenticated at this point
        $phone=  session('phone');
        $user = User::where('phone', $phone)->first();
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->update();
         $request->session()->forget('otp_verified');
         $request->session()->forget('phone_verify');
        return redirect()->route('login')->with('status', 'Password reset successfully. You can now login with your new password.');
    
    }
}
