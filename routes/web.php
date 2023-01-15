<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\educationController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\testingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/home', '/dashboard');

Route::get('/auth/redirect', [authController::class, 'redirect'])->middleware('guest');
//artinya ketika user mengakses /auth/redirect maka akan diarahkan ke controller authController dan method redirect

Route::get('/auth/callback', [authController::class, 'callback'])->middleware('guest');
//artinya ketika user mengakses /auth/callback maka akan diarahkan ke controller authController dan method callback
//jika user sudah login maka tidak bisa mengakses /auth/redirect dan /auth/callback
//karena sudah ada middleware guest
//middleware guest artinya jika user sudah login maka tidak bisa mengakses /auth/redirect dan /auth/callback

Route::get('/auth', [authController::class, 'index'])->name('login')->middleware('guest');
//fungsi name adalah untuk memberi nama pada route
//

// Route::get('dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('auth/logout', function () {
    Auth::logout();
    return redirect()->to('/auth');
});


Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('/halaman', halamanController::class);
        Route::resource('/experience', experienceController::class);
        Route::resource('/education', educationController::class);
        Route::get('skill', [skillController::class, 'index'])->name('skill.index');
        Route::post('skill', [skillController::class, 'update'])->name('skill.update');
    }
);




// Route::resource('/halaman', [halamanController::class], 'create');
