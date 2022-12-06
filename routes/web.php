<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
use App\Http\Controllers\BugUserController;
use App\Http\Controllers\MailController;
  
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
    session()->forget(['login_status']);
     // session()->forget(['message1']);
    return view('index');
});

Route::get('bug_details',[BugController::class,'show']);
Route::POST('login',[BugController::class,'login']);
Route::get('logout',[BugController::class,'logout']);
 Route::get('create',[BugController::class,'create']);
 Route::POST('insert',[BugController::class,'insert']);
 Route::get('edit/{id}',[BugController::class,'edit']);
Route::POST('update',[BugController::class,'update']);
Route::get('Delete/{id}',[BugController::class,'Delete']);

Route::get('user_panel',[BugUserController::class,'show']);
 Route::get('useredit/{id}',[BugUserController::class,'edit']);
 Route::POST('user_update',[BugUserController::class,'update']);

 // Route::get('send-mail', [MailController::class, 'index']);