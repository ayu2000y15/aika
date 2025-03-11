<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminInformationController;
use App\Http\Controllers\Admin\AdminDefinitionController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
// Contact 送信完了ページ
Route::post('/contact/send', [ContactController::class, 'send'])->name('send');

// 管理者ページログイン
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login/access', [AdminController::class, 'loginAccess'])->name('login.access');
// 管理者ページログアウト
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// 管理者ページ
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

//お知らせ管理
Route::get('/admin/information', [AdminInformationController::class, 'index'])->name('admin.information');
Route::post('/admin/information/store', [AdminInformationController::class, 'store'])->name('admin.information.store');
Route::post('/admin/information/update', [AdminInformationController::class, 'update'])->name('admin.information.update');
Route::delete('/admin/information/delete', [AdminInformationController::class, 'delete'])->name('admin.information.delete');

//画像管理
Route::get('/admin/photo', [AdminPhotoController::class, 'index'])->name('admin.photo');
Route::post('/admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin.photo.store');
Route::put('/admin/photo/update', [AdminPhotoController::class, 'update'])->name('admin.photo.update');
Route::delete('/admin/photo/delete', [AdminPhotoController::class, 'delete'])->name('admin.photo.delete');

//汎用テーブル管理
Route::get('/admin/definition', [AdminDefinitionController::class, 'index'])->name('admin.definition');
Route::post('/admin/definition/store', [AdminDefinitionController::class, 'store'])->name('admin.definition.store');
Route::post('/admin/definition/update', [AdminDefinitionController::class, 'update'])->name('admin.definition.update');
Route::delete('/admin/definition/delete', [AdminDefinitionController::class, 'delete'])->name('admin.definition.delete');
