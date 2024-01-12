<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('auth.layouts');
});

//Auth
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('forgot', [CustomAuthController::class, 'forgot'])->name('forgot');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//Class - teacher-student
Route::get('listOClass', [CustomAuthController::class, 'listOClass'])->name('listOClass');
Route::get('detailClass', [CustomAuthController::class, 'detailClass'])->name('detailClass');

//Class - teacher
Route::get('allTClass', [CustomAuthController::class, 'allTClass'])->name('allTClass');
Route::get('teacherClass', [CustomAuthController::class, 'teacherClass'])->name('teacherClass');
Route::get('waitClass', [CustomAuthController::class, 'waitClass'])->name('waitClass');

//Class - student
Route::get('allSClass', [CustomAuthController::class, 'allSClass'])->name('allSClass');
Route::get('studentClass', [CustomAuthController::class, 'studentClass'])->name('studentClass');
Route::get('billSClass', [CustomAuthController::class, 'billSClass'])->name('billSClass');

//Admin
Route::get('admin', [CustomAuthController::class, 'admin'])->name('admin');

Route::prefix('')->group(function () {});
