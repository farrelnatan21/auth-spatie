<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Kernel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function(){
    return '<h1>hello admin<h1>';
})->middleware(['auth','verified','role:admin']);

Route::get('penulis', function(){
    return '<h1>hello penulis<h1>';
})->middleware(['auth','verified','role:penulis|admin']);

Route::get('user', function(){
    return '<h1>hello user<h1>';
})->middleware(['auth','verified','role:user|penulis|admin']);

Route::get('tulisan', function(){
    return view('tulisan');
})->middleware(['auth','verified','role_or_permission:lihat-tulisan|admin']);

require __DIR__.'/auth.php';
