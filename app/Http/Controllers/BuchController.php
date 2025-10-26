<?php

namespace App\Http\Controllers;

use App\Models\Buch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BuchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');


        $buchs = Buch::when(
            $title,
            fn($query, $title) => $query->title($title)
        );

        $buchs = match ($filter)
        {
            'popular_letzter_monat' => $buchs->popularLetzterMonat(),
            'popular_letzter_6monate' => $buchs->popularLetzter6Monate(),
            'ambesten_bewertet_letzter_monate' => $buchs->ambestenBewertetLetzterMonat(),
            'ambesten_bewertet_letzter_6monate' => $buchs->ambestenBewertetLetzter6Monate(),
            default => $buchs->latest()->mitAvgBewertung()->mitRezensionCount()
        };



        $cacheKey = 'buchs:' . $filter . ':' . $title;
        $buchs = cache()->remember($cacheKey, 3600, fn() => $buchs->get());
        //OR
        // $buchs = cache::remembre($cachkey, 3600, fn() => $buchs->get())

        return view('buchs.index', ['buchs' => $buchs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cacheKey = 'buch:' . $id;

        $buch = cache()->remember($cacheKey, 3600, fn() => Buch::with([
                'rezension' => fn($query) => $query->latest()
                ])->mitAvgBewertung()->mitRezensionCount()->findOrFail($id)
            );

        return view('buchs.show', [ 'buch' => $buch ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
