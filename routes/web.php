<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {

    // dd(Auth::guard('admin')->check());

    if(Auth::guard('admin')->check()){
        return redirect()->route('admin.home');

    }
    if(Auth::guard('teacher')->check()){
        return redirect()->route('teacher.home');

    }
    if(Auth::guard('web')->check()){

        return redirect()->route('student.home');
    }
    // return view('dashboard');
})->middleware(['auth:web,teacher,admin', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('student/home',function(){
//     return 'student home';
// })->name('student.home')->middleware('auth');

// Route::get('teacher/home',function(){
//     return 'teacher home';
// })->name('teacher.home');

// Route::get('user/home',function(){
//     return 'user home';
// })->name('user.home');

// Front Site Routes
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/teachers', [SiteController::class, 'teacher'])->name('website.teachers');
Route::get('/actives', [SiteController::class, 'active'])->name('website.actives');
Route::get('/actives/{id}/singel', [SiteController::class, 'actives_singles'])->name('website.actives_singles');
// Route::get('/search', [SiteController::class, 'search'])->name('search');
// Route::get('/course/{id}/payment', [SiteController::class, 'payment'])->name('payment');
// Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
// Route::get('/about', [SiteController::class, 'about'])->name('about');
