<?php

use App\Http\Controllers\Api\V2\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/all', [IndexController::class, 'all'])->name('all');
