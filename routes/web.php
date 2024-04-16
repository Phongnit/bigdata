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


Route::prefix('mailbox')->group(function () {
     Route::get('/',[MailController::class,'inbox'])->name('mailbox.inbox');
     Route::get('/newchat',[MailController::class,'newchat'])->name('mailbox.newchat');
     Route::post('/newchat',[MailController::class,'create']);
     Route::get('/detail/{id}',[MailController::class,'detail'])->name('mailbox.detail');
     Route::put('/detail/{id}',[MailController::class,'update']);
     Route::delete('/delete/{id}',[MailController::class,'delete'])->name('mailbox.delete');
});


