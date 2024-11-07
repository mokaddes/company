<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
// admin
use App\Http\Controllers\PhotoController;
// user
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/work', [HomeController::class, 'work'])->name('frontend.work');
Route::get('/contact', [HomeController::class, 'contact'])->name('frontend.contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('frontend.contact.submit');
Route::get('/blog', [HomeController::class, 'blog'])->name('frontend.blog');
Route::get('/service', [HomeController::class, 'service'])->name('frontend.service');
Route::get('/shift', [HomeController::class, 'shift'])->name('frontend.shift');
