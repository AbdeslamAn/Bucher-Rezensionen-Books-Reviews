<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuchController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('buchs', BuchController::class);
