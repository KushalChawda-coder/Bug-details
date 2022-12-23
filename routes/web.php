<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BugController,BugUserController,MailController,UserController};
 
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

Route::get('/', function () { return view('index'); });

Route::get('bug_details',[BugController::class,'show'])->middleware('guard');
Route::get('create',[BugController::class,'create'])->middleware('guard');
Route::POST('insert',[BugController::class,'insert'])->middleware('guard');
Route::get('edit/{id}',[BugController::class,'edit'])->middleware('guard');
Route::POST('update',[BugController::class,'update'])->middleware('guard');
Route::get('Delete/{id}',[BugController::class,'Delete'])->middleware('guard');

Route::get('user_panel',[BugUserController::class,'show'])->middleware('guard');
Route::POST('user_update',[BugUserController::class,'update'])->middleware('guard');;


Route::get('registration',[UserController::class,'create']);
Route::post('custom-registration',[UserController::class,'customRegistration'])->name('register.custom');
Route::POST('login',[UserController::class,'login']);
Route::get('logout',[UserController::class,'logout']);
Route::get('no-access',function(){ echo "You are not allowd to access !"; die; });
