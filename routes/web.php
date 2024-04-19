<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('dashboard');

Route::prefix('submit')->group(function () {
    Route::get('/',[SubmitController::class,'list'])->name('submit.list');
    Route::get('/create',[SubmitController::class,'create'])->name('submit.create');
    Route::post('/create',[SubmitController::class,'store']);
    Route::get('/show/{id}',[SubmitController::class,'show'])->name('submit.show');
    Route::get('/edit/{id}',[SubmitController::class,'edit'])->name('submit.edit');
    Route::put('/edit/{id}',[SubmitController::class,'update']);
    Route::get('/delete/{id}',[SubmitController::class,'delete'])->name('submit.delete');
});

Route::prefix('emails')->group(function () {
     Route::get('/',[MailController::class,'index'])->name('emails.index');
     Route::get('/create',[MailController::class,'create'])->name('emails.create');
     Route::post('/create',[MailController::class,'store'])->name('emails.create');
     Route::get('/show/{id}',[MailController::class,'show'])->name('emails.show');
     Route::get('/edit/{id}',[MailController::class,'edit'])->name('emails.edit');
     Route::put('/edit/{id}',[MailController::class,'update'])->name('emails.edit');
     Route::get('/delete/{id}',[MailController::class,'delete'])->name('emails.delete');
     Route::get('/send/{id}',[MailController::class,'send'])->name('emails.send');
     Route::get('/sendmore/{id}',[MailController::class,'sendmore'])->name('emails.sendmore');
     Route::get('/sendall/{id}',[MailController::class,'sendall'])->name('emails.sendall');
     Route::get('/trashed',[MailController::class,'trashed'])->name('emails.trashed');
});

