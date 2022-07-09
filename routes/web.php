<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\LoginController;

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
//login route
Route::get('/',[LoginController::class,'showLoginForm']);
Route::post('/loginCheck',[LoginController::class,'loginCheck'])->name('loginCheck');
Route::get('/logout',[LoginController::class,'logout'])->name('admin_logout');


// ADMIN ROUTE START
// ADD MEMBER
Route::middleware('admin')->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/add_member', [EmployeeController::class, 'index'])->name('add.employee');
    Route::post('/store_member', [EmployeeController::class, 'store'])->name('store.employee');
       

});

