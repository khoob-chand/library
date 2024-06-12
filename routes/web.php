<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerData;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsServiceController;
use App\Http\Controllers\VideosController;
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
    return view('layouts/main');
});
Route::get('login',[UserController::class,'GetUserLoginForm']);
Route::post('/login',[UserController::class,'PostUserLoginForm']);
Route::get('logout',[UserController::class,'LogoutUser']);
Route::get('home/{name?}',[IndexController::class,'Home']);
Route::get('register',[UserController::class ,'GetUserRegistrationForm']);
Route::post('register',[UserController::class,'PostUserRegistrationForm']);
Route::get('customer',[CustomerData::class,'CustomerData']);
Route::post('customer',[CustomerData::class,'PostCustomerData']);
Route::get('customer-detail',[CustomerData::class,'GetCustomerDetails']);
Route::get('customer/update/{id}',[CustomerData::class,'GetUpdateCustomerForm']);
Route::post('customer/update/{id}',[CustomerData::class,'UpdateCustomerData']);
Route::get('email-verify/{token}',[UserController::class,'EmailVerification']);
Route::get('contact-us',[ContactController::class,'GetContactUs']);
Route::get('services',[ServicesController::class,'GetAllServices']);
Route::get('service-settings',[SettingsServiceController::class,'GetServicePage']);
Route::get('videos',[VideosController::class,'GetAllVideos']);


