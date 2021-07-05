<?php

use App\Http\Controllers\BannerController;
use App\Models\Banner;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'isParticipant' => false,
        'banners' => Banner::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/banners', [BannerController::class, 'store'])->middleware('auth');

require __DIR__ . '/auth.php';
require __DIR__ . '/participants_auth.php';
