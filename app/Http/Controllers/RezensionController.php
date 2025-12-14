<?php

namespace App\Http\Controllers;

use App\Models\Buch;
use Illuminate\Http\Request;

class RezensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Buch $buch)
    {
        return view('buchs.rezensions.create', ['buch' => $buch]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Buch $buch)
    {
        $data = $request->validate([
            'rezension' => 'required|min:15',
            'bewertung' => 'required|min:1|max:5|integer'
        ]);

        $buch->rezension()->create($data);

        session()->flash('success', 'Rezension erfolgreich erstellt');
        return redirect()->route('buchs.show', $buch);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
