i have used following commands to create auth module for user 
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev

about the routes , it was predefined , and u have made changes according to our project need in controllers and traits.

these are routes for particular modules: 

// predefined routes for user signup and login
Auth::routes();
//leads to the home page 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//leads to the admin dashboard 
Route::get('index', [AdminController::class, 'index'])->name('index')->middleware('checkip', 'RINadmin');
// Otp verfication for registeration
Route::post('verifyotp', [RegisterController::class, 'verifyOtp'])->name('verifyotp');
Route::post('/resendotp', [otpVerificationController::class, 'resendOtp'])->name('resendotp');
Route::get('userOTPverify', [otpVerificationController::class, 'verifyOtpForm'])->name('userOTP');
//admin login , logout routes 
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

//stocks table
Route::get('dashboard/dashboard-02',[StockController::class , 'index'])->name('dashboard-02');
//sapre parts form 
Route::get('userpanel/parts',[Sub_catController::class , 'classi'])->name('userpanel.parts');
