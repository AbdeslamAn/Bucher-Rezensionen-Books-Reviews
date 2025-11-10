<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuchController;

Route::get('/', function () {
    return redirect()->route('buchs.index');
});

Route::resource('buchs', BuchController::class)
        ->only(['index', 'show']);
