<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login',[PageController::class,'showLogin']);
Route::post('/admin/login',[PageController::class,'login']);
Route::prefix('admin')->group(function (){
   Route::post('/logout',[PageController::class,'logout']);
   Route::get('/',[PageController::class,'showDashboard']);
   Route::resource('/category',CategoryController::class);
   Route::resource('/color',ColorController::class);
   Route::resource('/brand',BrandController::class);
});
