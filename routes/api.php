<?php

use Illuminate\Support\Facades\Route;


Route::post('/rent', \App\Http\Controllers\API\BookingController::class)->name('books.rent');
Route::post('/evict_book', \App\Http\Controllers\API\EvictBookController::class)->name('books.evict');
