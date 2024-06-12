<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerData;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsServiceController;

Route::get('/student-details/{studentSlot}', [CustomerData::class, 'GetCustomerDetailsApi']);
Route::post('/save-student', [CustomerData::class, 'SaveStudentDetails']);
Route::post('/delete-student',[CustomerData::class,'DeleteStudent']);
Route::post('/save-contact-us',[ContactController::class,'SaveContactUsPage']);
Route::get('/settings-service',[SettingsServiceController::class,'GetAllSettingsService']);
Route::post('/save-settings-service',[SettingsServiceController::class,'SaveSettingsService']);
Route::delete('/del-setting-service',[SettingsServiceController::class,'DeleteSettingService']);
Route::post('get-student',[CustomerData::class,'GetSelectedStudent']);
