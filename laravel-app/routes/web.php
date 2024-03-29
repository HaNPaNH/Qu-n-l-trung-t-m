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

Route::get('registerSClass/{classId}', [ClassroomController::class, 'registerSClass'])->name('registerSClass');
Route::get('confirm-register-student/{classId}', [ClassroomController::class, 'confirmStudentRegister'])->name('confirmStudentRegister');

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
Route::get('confirm-register-teacher/{classId}', [ClassroomController::class, 'confirmTeacherRegister'])->name('confirmTeacherRegister');

//Class - student
Route::get('studentProfile', [StudentController::class, 'studentProfile'])->name('studentProfile');

Route::get('addStudentInformation',[StudentController::class, 'addStudentInformation'])->name('addStudentInformation');
Route::post('saveStudentInformation', [StudentController::class, 'saveStudentInformation'])->name('saveStudentInformation');

Route::get('updateStudentInformation/{id}', [StudentController::class, 'editStudentInformation'])->name('editStudentInformation');
Route::post('updateStudentInformation/{id}', [StudentController::class, 'updateStudentInformation'])->name('updateStudentInformation');

Route::get('allSClass', [StudentController::class, 'allSClass'])->name('allSClass');
Route::get('studentClass', [StudentController::class, 'studentClass'])->name('studentClass');
Route::get('billSClass/{studentClassId}', [StudentController::class, 'billSClass'])->name('billSClass');

//Admin
Route::get('admin', [AdminController::class, 'index'])->name('index');
Route::get('adminProfile', [AdminController::class, 'adminProfile'])->name('adminProfile');
Route::get('updateAdminProfile/{id}', [AdminController::class, 'editAdminProfile'])->name('editAdminProfile');
Route::post('updateAdminProfile/{id}', [AdminController::class, 'updateAdminProfile'])->name('updateAdminProfile');

Route::get('listStudent', [AdminController::class, 'listStudent'])->name('listStudent');
Route::get('listTeacher', [AdminController::class, 'listTeacher'])->name('listTeacher');
Route::get('listClass', [AdminController::class, 'listClass'])->name('listClass');

Route::get('detailStudent/{id}', [AdminController::class, 'detailStudent'])->name('detailStudent');
Route::get('detailTeacher/{id}', [AdminController::class, 'detailTeacher'])->name('detailTeacher');
Route::get('detailAdminClass/{id}', [AdminController::class, 'detailAdminClass'])->name('detailAdminClass');

Route::get('waitTeacherClass/{id}', [AdminController::class, 'waitTeacherClass'])->name('waitTeacherClass');
Route::get('acceptTeacherRegister/{id}/{class_id}', [AdminController::class, 'acceptTeacherRegister'])->name('acceptTeacherRegister');
Route::get('refuseTeacherRegister/{id}', [AdminController::class, 'refuseTeacherRegister'])->name('refuseTeacherRegister');

Route::get('billStudentClass/{id}', [AdminController::class, 'billStudentClass'])->name('billStudentClass');
Route::get('confirmPayment/{id}', [AdminController::class, 'confirmPayment'])->name('confirmPayment');

Route::get('attendanceInformation/{id}', [AdminController::class, 'attendanceInformation'])->name('attendanceInformation');
Route::get('attendanceStudent/{id}', [AdminController::class, 'attendanceStudent'])->name('attendanceStudent');

Route::get('deleteStudent/{id}', [AdminController::class, 'deleteStudent'])->name('deleteStudent');
Route::get('deleteTeacher/{id}', [AdminController::class, 'deleteTeacher'])->name('deleteTeacher');
Route::get('deleteClass/{id}', [AdminController::class, 'deleteClass'])->name('deleteClass');

Route::get('addClass', [AdminController::class, 'addClass'])->name('addClass');
Route::post('saveClass', [AdminController::class, 'saveClass'])->name('saveClass');
Route::get('updateClass/{id}', [AdminController::class, 'editClass'])->name('editClass');
Route::post('updateClass/{id}', [AdminController::class, 'updateClass'])->name('updateClass');

Route::get('updateStudent/{id}', [AdminController::class, 'editStudent'])->name('editStudent');
Route::post('updateStudent/{id}', [AdminController::class, 'updateStudent'])->name('updateStudent');

Route::get('updateTeacher/{id}', [AdminController::class, 'editTeacher'])->name('editTeacher');
Route::post('updateTeacher/{id}', [AdminController::class, 'updateTeacher'])->name('updateTeacher');
// Route::prefix('')->group(function () {});