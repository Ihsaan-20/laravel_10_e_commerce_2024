<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('logout', [AuthController::class, 'admin_logout'])->name('logout');



    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('admin/add/store', [AdminController::class, 'store'])->name('admin.add.store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');


    Route::get('profile', function () {
        return view('admin.profile');
    });

});



Route::get('/', function () {
    return view('welcome');
});




