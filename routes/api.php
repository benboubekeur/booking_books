<?php

use Illuminate\Support\Facades\Route;


Route::post('/rent', \App\Http\Controllers\API\BookingController::class)->name('books.rent');
Route::post('/evict', \App\Http\Controllers\API\EvictBookController::class)->name('books.evict');
Route::get('/rents', \App\Http\Controllers\API\ReservedBooksListController::class)->name('books.rents');
