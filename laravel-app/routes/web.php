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

// Route::get('registerSClass/{id}', [ClassroomController::class, 'registerSClass'])->name('registerSClass');
// Route::get('confirm-register/{classId}', [ClassroomController::class, 'confirmRegister'])->name('confirmRegister');
// Route::get('cancel-register', [ClassroomController::class, 'cancelRegister'])->name('cancelRegister');

// Route::get('addStudentInformation',[ClassroomController::class, 'addStudentInformation'])->name('addStudentInformation');
// Route::post('saveStudentInformation', [ClassroomController::class, 'saveStudentInformation'])->name('saveStudentInformation');

Route::group(['middleware' => ['web']], function () {
    Route::get('registerSClass/{id}', [ClassroomController::class, 'registerSClass'])->name('registerSClass');
    Route::get('confirm-register/{classId}', [ClassroomController::class, 'confirmRegister'])->name('confirmRegister');
    Route::get('cancel-register', [ClassroomController::class, 'cancelRegister'])->name('cancelRegister');

    Route::get('addStudentInformation', [ClassroomController::class, 'addStudentInformation'])->name('addStudentInformation');
    Route::post('saveStudentInformation', [ClassroomController::class, 'saveStudentInformation'])->name('saveStudentInformation');
});
Route::get('checkStudentClass/{classId}', [ClassroomController::class, 'checkStudentClass'])->name('checkStudentClass');

//Class - teacher
// Route::post('addTInfor',[TeacherController::class, 'addInfor'])->name('addInfor');
Route::get('teacherProfile', [TeacherController::class, 'teacherProfile'])->name('teacherProfile');

Route::get('addTeacherInformation', [TeacherController::class, 'addTeacherInformation'])->name('addTeacherInformation');
Route::post('saveTeacherInformation', [TeacherController::class, 'saveTeacherInformation'])->name('saveTeacherInformation');

Route::get('updateTeacherInformation/{id}', [TeacherController::class, 'editTeacherInformation'])->name('editTeacherInformation');
Route::post('updateTeacherInformation/{id}', [TeacherController::class, 'updateTeacherInformation'])->name('updateTeacherInformation');
    
Route::get('allTClass', [TeacherController::class, 'allTClass'])->name('allTClass');
Route::get('teacherClass', [TeacherController::class, 'teacherClass'])->name('teacherClass');
Route::get('waitClass', [TeacherController::class, 'waitClass'])->name('waitClass');

Route::get('checkTeacherClass/{classId}', [ClassroomController::class, 'checkTeacherClass'])->name('checkTeacherClass');
Route::get('registerTeacherClass/{classId}', [ClassroomController::class, 'registerTeacherClass'])->name('registerTeacherClass');
Route::get('confirm-register/{classId}', [ClassroomController::class, 'confirmTeacherRegister'])->name('confirmTeacherRegister');
Route::get('cancel-register', [ClassroomController::class, 'cancelTeacherRegister'])->name('cancelTeacherRegister');

//Class - student
Route::get('studentProfile', [StudentController::class, 'studentProfile'])->name('studentProfile');

Route::get('updateStudentInformation/{id}', [StudentController::class, 'editStudentInformation'])->name('editStudentInformation');
Route::post('updateStudentInformation/{id}', [StudentController::class, 'updateStudentInformation'])->name('updateStudentInformation');

Route::get('allSClass', [StudentController::class, 'allSClass'])->name('allSClass');
Route::get('studentClass', [StudentController::class, 'studentClass'])->name('studentClass');
Route::get('billSClass/{studentClassId}', [StudentController::class, 'billSClass'])->name('billSClass');

//Admin
Route::get('admin', [AdminController::class, 'admin'])->name('admin');
Route::get('mStudent', [AdminController::class, 'mStudent'])->name('mStudent');
Route::get('mSStudent', [AdminController::class, 'mSStudent'])->name('mSStudent');

// Route::prefix('')->group(function () {});