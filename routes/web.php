<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PhoneVerificationController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\otpVerificationController;
use App\Http\Controllers\Sub_catController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TwilioServiceController;

//routes for user login and registeration 
Auth::routes();

//route leads to the supposed home page for user
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route leads to the welcome page 
Route::get('/', function () 
 {
    return view('welcome');
 });
//route leads to the admin dashboard
Route::get('index', [AdminController::class, 'index'])->name('index')->middleware('checkip', 'RINadmin');

//routes for the otp verification for user registeration
Route::post('verifyotp', [RegisterController::class, 'verifyOtp'])->name('verifyotp');
Route::post('/resendotp', [otpVerificationController::class, 'resendOtp'])->name('resendotp');
Route::get('userOTPverify', [otpVerificationController::class, 'verifyOtpForm'])->name('userOTP');

//routes for admin login and logout
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::Post('admin/verifyToken', [AdminLoginController::class, 'verifyToken'])->name('verifyToken');

//SMSalaService 
Route::get('passwordrequestviaSMS', [PhoneVerificationController::class, 'showVerificationForm'])->name('password.request.via.SMS');
Route::post('verify-phone', [PhoneVerificationController::class, 'verifyPhoneNumber'])->name('verify.phone');
Route::post('verify-otp', [PhoneVerificationController::class, 'verifyOtp'])->name('verify.otp');
Route::post('adminpassword/update', [PhoneVerificationController::class, 'updatePassword'])->name('passwordreset');
Route::post('/resend-otp', [PhoneVerificationController::class, 'resendOtp'])->name('resend.otp');


// TwilioService
Route::get('via-email-or-whatsapp', [TwilioServiceController::class, 'ChooseService'])->name('choose.service');
Route::get('password-request-via-whatsapp', [TwilioServiceController::class, 'WhatsappForm'])->name('password.request.via.whatsapp');
Route::post('send-otp-via-whatsapp', [TwilioServiceController::class, 'SendOtp'])->name('Send.Otp.via.whatsapp');
Route::post('verify-otp-via-whatsapp', [TwilioServiceController::class, 'verifyOtp'])->name('verify.otp.via.whatsapp');
Route::post('password-update-via-whatsapp', [TwilioServiceController::class, 'updatePassword'])->name('password.reset.via.whatsapp');
Route::post('/resend-otp-via-whatsapp', [TwilioServiceController::class, 'resendOtp'])->name('resend.otp.via.whatsapp');

//route for stocks datatable
Route::get('dashboard/dashboard-02',[StockController::class , 'index'])->name('dashboard-02');

Route::get('userpanel/parts',[Sub_catController::class , 'classi'])->name('userpanel.parts');


