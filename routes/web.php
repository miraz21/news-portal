<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home',[App\Http\Controllers\FrontendController::class,'redirect']);

Route::get('/',[App\Http\Controllers\FrontendController::class,'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'adminDashboard'])->name('adminDashboard');

Route::get('/category/index',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

Route::get('/category/add',[App\Http\Controllers\CategoryController::class,'add'])->name('category.add');

Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');

Route::get('/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');

Route::post('/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

Route::post('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');



Route::get('/news/index',[App\Http\Controllers\NewsController::class,'index'])->name('news.index');

Route::get('/news/add',[App\Http\Controllers\NewsController::class,'add'])->name('news.add');

Route::post('/news/store',[App\Http\Controllers\NewsController::class,'store'])->name('news.store');

Route::post('/news/edit/{id}',[App\Http\Controllers\NewsController::class,'edit'])->name('news.edit');

Route::post('/news/update/{id}',[App\Http\Controllers\NewsController::class,'update'])->name('news.update');