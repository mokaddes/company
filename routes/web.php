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
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get('/admin', function () {
    return redirect('/admin/login');
});
