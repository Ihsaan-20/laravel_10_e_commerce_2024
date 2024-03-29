<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;

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

    //Admin crud routes
    Route::get('admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    //Category crud routes
    Route::get('category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    //Sub-Category crud routes
    Route::get('sub_category/list', [SubCategoryController::class, 'list'])->name('sub_category.list');
    Route::get('sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
    Route::post('sub_category/store', [SubCategoryController::class, 'store'])->name('sub_category.store');
    Route::get('sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::put('sub_category/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
    Route::get('sub_category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');
    Route::post('get/sub_categories', [SubCategoryController::class, 'getSubCategories'])->name('get.sub_categories');
    
    //Brand crud routes
    Route::get('brand/list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    //Color crud routes
    Route::get('color/list', [ColorController::class, 'list'])->name('color.list');
    Route::get('color/add', [ColorController::class, 'add'])->name('color.add');
    Route::post('color/store', [ColorController::class, 'store'])->name('color.store');
    Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::put('color/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::get('color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
    //Product crud routes
    Route::get('product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/image/delete/{id}', [ProductController::class, 'deleteProductImage'])->name('product_image.delete');
    Route::post('product/image/sort', [ProductController::class, 'productImageSort'])->name('product_image.sort');

    Route::get('profile', function () {
        return view('admin.profile');
    });

});

//Slug generator
Route::post('/generate-slug', function(Request $request){
    $slug = Str::slug($request->input('title'), '-');
    return response()->json(['slug' => $slug]);
})->name('generate.slug');

Route::get('/', function () {
    return view('welcome');
});




