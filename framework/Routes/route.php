<?php
use App\Services\Route;
use App\Models\UserModels;
use App\Middleware\{Auth,Guest};


Route::get('/','HomeController','index');
Route::get('/login','LoginController','index',[Guest::class]);
Route::post('/loginAction','LoginController','login',[Guest::class]);
Route::get('/logout','LoginController','logout',[Auth::class]);
Route::get('/register','RegisterController','index',[Guest::class]);
Route::post('/registerAction','RegisterController','register',[Guest::class]);
Route::get('/dashboard','HomeController','index',[Auth::class]);