<?php

use Illuminate\Support\Facades\Route;


Route::post('/rent', \App\Http\Controllers\API\BookingController::class)->name('books.rent');
