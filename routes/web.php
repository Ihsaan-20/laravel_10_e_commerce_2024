<?php

use App\Http\Controllers\AuthController;
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

Route::get('admin/login', [AuthController::class, 'admin_login'])->name('admin.login');
Route::post('admin/login/process', [AuthController::class, 'admin_login_process'])->name('admin.login.process');

Route::post('admin/dashboard', [AuthController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('admin/logout', [AuthController::class, 'admin_logout'])->name('admin.logout');

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/profile', function () {
    return view('admin.profile');
});
