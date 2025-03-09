<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
// Contact 送信完了ページ
Route::post('/contact/send', [ContactController::class, 'send'])->name('send');

