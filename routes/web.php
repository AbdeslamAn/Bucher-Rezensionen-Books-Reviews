<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuchController;
use App\Http\Controllers\RezensionController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

Route::get('/', function () {
    return redirect()->route('buchs.index');
});

Route::resource('buchs', BuchController::class)
        ->only(['index', 'show']);

Route::resource('buchs.rezensions', RezensionController::class)
        ->scoped(['rezension' => 'buch'])
        ->only(['create', 'store']);

// limit number of reviews per hour using rate limiting
// Begrenzung der Anzahl von Rezensionen pro Stunde durch Rate Limiting hinzugefügt
RateLimiter::for ('rezensions', function(Request $request){
    return Limit::perHour(3)->by($request->user()?->id ?: $request->ip());
});
