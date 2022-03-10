<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminFrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
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

Auth::routes();


Route::get('/home', [HomeController::class,'index']);

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/category', [AdminFrontendController::class,'index']);
  });
//   Route::get('/category',[CategoryController::class,'index'])->name('category.index');

// Route::post('/category',[CategoryController::class,'insert']);
// Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('edit');
// Route::put('/category/edit/{id}',[CategoryController::class,'update'])->name('update');
// Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');
Route::get('/category',[TaskController::class,'index'])->name('category.index');

Route::post('/add/category',[TaskController::class,'insert']);
Route::get('/category/edit/{id}',[TaskController::class,'edit'])->name('edit');
Route::put('/category/edit/{id}',[TaskController::class,'update'])->name('update');
Route::get('/category/delete/{id}',[TaskController::class,'delete'])->name('delete');

Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::post('/product',[ProductController::class, 'insert']);
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('pro.edit');
Route::put('/product/edit/{id}',[ProductController::class, 'update']);
Route::get('/product/delete/{id}',[ProductController::class, 'delete']);

Route::get('/frontend', [FrontendController::class, 'index']);