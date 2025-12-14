@extends('layouts.app')

@section('content')
    <div class=" w-[400px] flex flex-col md:w-full">
    <h1 class="mb-10 text-2xl flex justify-center ">Rezension erstellen für {{ $buch->title }}</h1>

    <form method="POST" action="{{ route('buchs.rezensions.store', $buch) }}">
        @csrf
        <label for="rezension">Rezension</label>
        <textarea name="rezension" id="rezension" required class="input mb-4"></textarea>

        <label for="bewertung">Bewertung</label>

        <select name="bewertung" id="bewertung" class="input mb-4" required>
            <option value="">Bitte eine Bewertung auswählen</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit" class="createbtn">Rezension erstellen</button>
    </form>
    </div>
