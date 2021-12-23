<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\RoomtypeController;
use App\Http\controllers\AdminController;
use App\Http\controllers\RoomController;
use App\Http\controllers\CustomerController;


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
    return view('home');
});


Route::get('/admin/login', [AdminController::class,'login']);
Route::post('/admin/login', [AdminController::class,'check_login']);
Route::get('/admin/logout', [AdminController::class,'logout']);

Route::get('/admin', function () {
    return view('dashboard');
});

//RoomType Controller
Route::resource('admin/roomtype',RoomtypeController::class);
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);


//Room Controller
Route::resource('admin/rooms',RoomController::class);
Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);

//Customer Controller
Route::resource('admin/customer',CustomerController::class);
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);

// Delete Image
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);