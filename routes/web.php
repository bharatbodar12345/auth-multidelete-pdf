<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\SingupController;
use App\Http\Controllers\NewsController;





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

Route::get('/login',[logincontroller::class, 'login'])->name('login');

Route::get('/singup',[SingupController::class, 'singup']);

Route::post('/singin', [SingupController::class, 'insert']);

Route::post('/login/user', [logincontroller::class, 'credentials']);

Route::get('/datatable', [logincontroller::class, 'tableshow'])->middleware('auth');

Route::get('/logout', [logincontroller::class, 'logout']);

Route::get('/editform/{id}', [SingupController::class, 'editshow']);

Route::post('/editform/update/{id}', [SingupController::class, 'update']);

Route::delete('/delete/{id}', [SingupController::class, 'destroy']);

Route::get('/pdf',[logincontroller::class, 'pdfview']);

Route::get('/login.in',[logincontroller::class, 'pdfview']);

Route::post('/sharksDeleteAll',[ logincontroller::class, 'deleteAll']);

Route::get('/form',[NewsController::class, 'insert'])->middleware('auth');

Route::post('/form/submit',[NewsController::class, 'submit'])->middleware('auth');

Route::get('/news/show',[NewsController::class, 'cards']);

Route::get('/user/news',[NewsController::class, 'usernews'])->middleware('auth');



















