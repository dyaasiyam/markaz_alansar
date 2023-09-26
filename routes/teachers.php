<?php

use App\Http\Controllers\ActiveController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\TeacherController as TeacherTeacherController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherTimesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/teacher')->name('teacher.')->middleware('auth:teacher')->group(function() {
    Route::get('/home', [TeacherController::class, 'index'])->name('home');

    Route::get('/profile', [TeacherController::class, 'profile'])->name('teacher.profile.profile');
    Route::put('/profile/update', [TeacherController::class, 'profile_update'])->name('teacher.profile.update');

    Route::get('/profile/password', [TeacherController::class, 'profile_password'])->name('profile_password');
    Route::put('/profile/password', [TeacherController::class, 'profile_password_update']);
    Route::get('/attendance', 'App\Http\Controllers\TeacherController@attendance')->name('attendance');
    Route::post('/record-attendance', 'App\Http\Controllers\TeacherController@record')->name('record-attendance');
    Route::get('/show-attendance', 'App\Http\Controllers\TeacherController@show_attendance')->name('show-attendance');
    Route::get('/students/attendance/{student_id}', 'App\Http\Controllers\TeacherController@showStudentAttendanceDetails')->name('showStudentAttendanceDetails');



    Route::get('/plan/{id}/{status}', [PlansController::class, 'plan_status'])->name('plan_status');

// routes/web.php

// Route::get('/teacher/plan/{id}', 'TeacherPlanController@show')->name('teacher.plan.show');

    Route::resource('teacher', TeacherTeacherController::class);
    Route::resource('exam', ExamsController::class);
    Route::resource('plans', PlansController::class);
    Route::resource('active', ActiveController::class);
});


