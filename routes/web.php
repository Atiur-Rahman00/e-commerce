<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\FrontendController;

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

//all backend routes starts
Route::name('backend.')->group(function(){
    Route::get('/dashboard', [BackendController::class, 'index'])->name('backend.home');
    //all category routes
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'softdelete']);
    Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
    Route::get('/category/permanent/delete/{id}', [CategoryController::class, 'forceDelete']);
    //all brand routes
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
});
//all backend routes ends

//all frontend routes starts
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
//all frontend routes ends

