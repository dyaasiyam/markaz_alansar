<?php

use App\Http\Controllers\Admin\ActiveController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CircleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\TeacherController;

use App\Http\Controllers\ProfileController;
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

Route::prefix('/admin')->name('admin.')->middleware('auth:admin')->group(function() {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('stage',StageController::class);
    Route::resource('circle',CircleController::class);
    Route::resource('active',ActiveController::class);
    Route::resource('teacher',TeacherController::class);
    Route::resource('parent',ParentController::class);

    Route::resource('student',App\Http\Controllers\Admin\StudentController::class);
    Route::get('/admin/get-teachers', [App\Http\Controllers\Admin\StudentController::class, 'getTeachers'])->name('admin.getTeachers');

    Route::resource('course',CourseController::class);
    Route::get('admin/circle/create', 'CircleController@create')->name('admin.circle.create');
    Route::get('/profile', [CircleController::class, 'profile'])->name('admin.profile.profile');
    Route::put('/profile/update', [CircleController::class, 'profile_update'])->name('admin.profile.update');

    Route::get('/profile/password', [CircleController::class, 'profile_password'])->name('profile_password');
    Route::put('/profile/password', [CircleController::class, 'profile_password_update']);
    Route::get('/get-circles', [TeacherController::class, 'getCircles'])->name('get.circles');
    Route::get('/admin/students/{student}', 'StudentController@show')->name('admin.student.show');

    Route::get('/admin/accept/{activity}', 'AdminController@acceptActivity')->name('admin.accept');
    Route::get('/admin/reject/{activity}', 'App\Http\Controllers\Admin\ActiveController@rejectActivity')->name('admin.reject');
    Route::get('/activity/accept/{id}', [TeacherController::class, 'acceptActivity'])->name('activity.accept');
    Route::get('/activity/reject/{id}', [TeacherController::class, 'rejectActivity'])->name('activity.reject');



});
