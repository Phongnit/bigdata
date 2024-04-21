<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/')->middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

Route::prefix('submit')->middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    Route::get('/', [SubmitController::class, 'list'])->name('submit.list');
    Route::get('/create', [SubmitController::class, 'create'])->name('submit.create');
    Route::post('/create', [SubmitController::class, 'store']);
    Route::get('/show/{id}', [SubmitController::class, 'show'])->name('submit.show');
    Route::get('/edit/{id}', [SubmitController::class, 'edit'])->name('submit.edit');
    Route::put('/edit/{id}', [SubmitController::class, 'update']);
    Route::get('/delete/{id}', [SubmitController::class, 'delete'])->name('submit.delete');
});

Route::prefix('emails')->middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    Route::get('/', [MailController::class, 'index'])->name('emails.index');
    Route::get('/create', [MailController::class, 'create'])->name('emails.create');
    Route::post('/create', [MailController::class, 'store'])->name('emails.create');
    Route::get('/show/{id}', [MailController::class, 'show'])->name('emails.show');
    Route::get('/edit/{id}', [MailController::class, 'edit'])->name('emails.edit');
    Route::put('/edit/{id}', [MailController::class, 'update'])->name('emails.edit');
    Route::get('/delete/{id}', [MailController::class, 'delete'])->name('emails.delete');
    Route::get('/send/{id}', [MailController::class, 'send'])->name('emails.send');
    Route::get('/sendmore/{id}', [MailController::class, 'sendmore'])->name('emails.sendmore');
    Route::get('/sendall/{id}', [MailController::class, 'sendall'])->name('emails.sendall');
    Route::get('/trashed', [MailController::class, 'trashed'])->name('emails.trashed');
    Route::get('/return/{id}', [MailController::class, 'return'])->name('emails.return');
    Route::get('/draft', [MailController::class, 'draft'])->name('emails.draft');
});

Route::prefix('sms')->middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    Route::get('/', [SmsController::class, 'index'])->name('sms.index');
    Route::get('/create', [SmsController::class, 'create'])->name('sms.create');
    Route::post('/create', [SmsController::class, 'store'])->name('sms.create');
    Route::get('/show/{id}', [SmsController::class, 'show'])->name('sms.show');
    Route::get('/edit/{id}', [SmsController::class, 'edit'])->name('sms.edit');
    Route::put('/edit/{id}', [SmsController::class, 'update'])->name('sms.edit');
    Route::get('/delete/{id}', [SmsController::class, 'delete'])->name('sms.delete');
    Route::get('/send/{id}', [SmsController::class, 'send'])->name('sms.send');
    Route::get('/sendmore/{id}', [SmsController::class, 'sendmore'])->name('sms.sendmore');
    Route::get('/sendall/{id}', [SmsController::class, 'sendall'])->name('sms.sendall');
    Route::get('/trashed', [SmsController::class, 'trashed'])->name('sms.trashed');
    Route::get('/return/{id}', [SmsController::class, 'return'])->name('sms.return');
    Route::get('/draft', [SmsController::class, 'draft'])->name('sms.draft');
});
