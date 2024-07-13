<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class otpVerificationController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data,[ 
            'otp' => 'required|array|min:3|max:3',
              'otp.*' => 'required|string|size:2',
          ]);
           

    }
    //redirecting to form
    public function verifyOtpForm()
    {    
        if(!empty(session('reguserid')))
        {
        return view('auth.verifyOTP');
        }
        else
        {
            return redirect()->route('error-404');
        }
    }
    
    //

    public function resendOtp()
    {
        $newotp = rand(100000, 999999);
        $id=  session('reguserid');
        $user = User::where('id', $id)->first();
        $user->otp = $newotp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->update();
        return redirect()->route('login')->with(['success' => 'OTP has been resent.'], 200);
    }
   
    

}