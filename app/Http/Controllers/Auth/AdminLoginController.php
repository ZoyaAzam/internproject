<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendTokenMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) 
        {
            $token = Str::random(60);
            $admin->update(['auth_token' => $token]);

            $request->session()->put('adminpresent', $admin->id);
            $email = 'zoya.shah13011@gmail.com';
            Mail::to($email)->send(new SendTokenMail($token));
            
            return redirect()->back()->with('status', 'Add your token, Mail has been sent successfully');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'The provided credentials are invalid.']);
    }

    public function verifyToken(Request $request)
    {
        if (!session('adminpresent')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'token' => 'required|string',
        ]);

        $adminId = session('adminpresent');
        $admin = Admin::find($adminId);

        if($admin) 
        {
        $currentHour = Carbon::now()->format('H');
        $url = $admin->auth_token.'/'.$currentHour;
        if($url=== $request->token) 
        {
           // Clear the token
           $admin->update(['auth_token' => null]);
           Auth::guard('admin')->login($admin);
           $request->session()->forget('adminpresent');
           return redirect()->intended('index');
        }
        }

        return back()->withErrors(['token' => 'The provided token is invalid.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return route('/');
    }
}
