<?php

use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::prefix('/student')->name('student.')->middleware('auth')->group(function() {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::get('/about', [StudentController::class, 'about'])->name('about');
    Route::get('/students/{id}', [StudentController::class, 'show'] )->name('show');

    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::put('/profile', [StudentController::class, 'profile_update']);
    Route::resource('parent', App\Http\Controllers\ParentsController::class);
    // Route::get('/student/edit/{id}', 'StudentController@edit')->name('student.edit');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'] )->name('student.edi');
    Route::put('/student/update/{id}',  [StudentController::class, 'update'])->name('student.update');
    Route::get('/plan/{id}', 'App\Http\Controllers\PlansController@show_plan')->name('student.plan.show');



    Route::get('student/attendance', 'App\Http\Controllers\StudentController@showStudentAttendanceDetails')
    ->name('student.attendance');

    Route::get('showeams', 'App\Http\Controllers\ExamsController@show')
    ->name('student.showeams');

    Route::get('showplans', 'App\Http\Controllers\PlansController@show')
    ->name('student.showplans');



    Route::get('/profile/password', [StudentController::class, 'profile_password'])->name('profile_password');
    Route::put('/profile/password', [StudentController::class, 'profile_password_update']);

});

