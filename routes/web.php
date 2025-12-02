<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuchController;
use App\Http\Controllers\RezensionController;

Route::get('/', function () {
    return redirect()->route('buchs.index');
});

Route::resource('buchs', BuchController::class)
        ->only(['index', 'show']);

Route::resource('buchs.rezensions', RezensionController::class)
        ->scoped(['rezension' => 'buch'])
        ->only(['create', 'store']);
