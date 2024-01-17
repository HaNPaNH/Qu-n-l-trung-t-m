<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AdminController;
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
Route::get('listSClass/{id}', [ClassroomController::class, 'listSClass'])->name('listSClass');
Route::get('detailClass/{id}', [ClassroomController::class, 'detailClass'])->name('detailClass');

Route::get('registerSClass/{id}', [ClassroomController::class, 'registerSClass'])->name('registerSClass');
Route::get('confirm-register/{classId}', [ClassroomController::class, 'confirmRegister'])->name('confirmRegister');
Route::get('cancel-register', [ClassroomController::class, 'cancelRegister'])->name('cancelRegister');

Route::get('addSInfor',[ClassroomController::class, 'addSInfor'])->name('addSInfor');
Route::post('saveSInfor', [ClassroomController::class, 'saveSInfor'])->name('saveSInfor');

//Class - teacher
// Route::post('addTInfor',[TeacherController::class, 'addInfor'])->name('addInfor');

Route::get('allTClass', [TeacherController::class, 'allTClass'])->name('allTClass');
Route::get('teacherClass', [TeacherController::class, 'teacherClass'])->name('teacherClass');
Route::get('waitClass', [TeacherController::class, 'waitClass'])->name('waitClass');
Route::get('checkStudentClass/{classId}', [ClassroomController::class, 'checkStudentClass'])->name('checkStudentClass');

//Class - student
Route::get('allSClass', [StudentController::class, 'allSClass'])->name('allSClass');
Route::get('studentClass', [StudentController::class, 'studentClass'])->name('studentClass');
Route::get('billSClass/{studentClassId}', [StudentController::class, 'billSClass'])->name('billSClass');

//Admin
Route::get('admin', [AdminController::class, 'admin'])->name('admin');
Route::get('mStudent', [AdminController::class, 'mStudent'])->name('mStudent');
Route::get('mSStudent', [AdminController::class, 'mSStudent'])->name('mSStudent');

// Route::prefix('')->group(function () {});