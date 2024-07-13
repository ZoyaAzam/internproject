<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string 
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|array|min:3|max:3',
              'otp.*' => 'required|string|size:2',
          ]);
        $id=  session('reguserid');
        $user = User::where('id', $id)->first();
        $otp = implode('', $request->input('otp'));
        if ($user->otp == $otp ) {
            if( $user->otp_expires_at >= now())
            {
            // OTP is correct, mark OTP as verified
            $user->is_verify = 1;
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->update();
            $request->session()->forget('reguserid');
                        
            $this->guard()->login($user);
            return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
           } else
           {
            return back()->withErrors(['otp' => 'Time expired. ']);
           }
           }else {
            return back()->withErrors(['otp' => 'Invalid OTP']);

        }
    }
    protected function registered(Request $request, $user)
    {
        //
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'region' => 'required',
            'phone' => ['required','unique:users'],
            'g-recaptcha-response' => 'required',
        ],
        
        [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
   
}