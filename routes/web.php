<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\RoomtypeController;
use App\Http\controllers\AdminController;
use App\Http\controllers\RoomController;
use App\Http\controllers\CustomerController;
use App\Http\controllers\StaffDepartmentController;
use App\Http\controllers\StaffController;


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

//Department Controller
Route::resource('admin/department',StaffDepartmentController::class);
Route::get('admin/department/{id}/delete',[StaffDepartmentController::class,'destroy']);

//Staff Controller
Route::resource('admin/staff',StaffController::class);
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);

// Staff Payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);