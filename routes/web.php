<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Home Controller Routes

Route::post('/appoinment',[HomeController::class,'appoinment']);
Route::get('/myappoinment',[HomeController::class,'myappoinment']);
Route::get('/cancel_appoin/{id}',[HomeController::class,'cancel_appoin']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[HomeController::class,'index']);


// Admin Controller Routes

Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::get('/showappoinment',[AdminController::class,'showappoinment']);
Route::get('/showdoctor',[AdminController::class,'showdoctor']);
Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/canceled/{id}',[AdminController::class,'canceled']);
Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);
Route::post('editdoctor/{id}',[AdminController::class,'editdoctor']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
