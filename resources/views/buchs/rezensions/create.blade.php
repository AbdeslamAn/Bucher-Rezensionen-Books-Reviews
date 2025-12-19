@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class=" w-[400px] flex flex-col md:w-full">
    <h1 class="mb-10 text-2xl flex justify-center ">Rezension erstellen für {{ $buch->title }}</h1>

    <form method="POST" action="{{ route('buchs.rezensions.store', $buch) }}">
        @csrf
        <div class="mb-4">
        <label for="rezension" class="block float-left mb-1">Rezension</label>
        <textarea name="rezension" id="rezension" required class="input">{{ old('rezension') }}</textarea>
        <div class="min-h-2 mt-1">
           @error('rezension')
              <p class=" text-red-500 dark:text-red-400 text-sm float-left"> {{ $message }}</p>
           @enderror
        </div>
        </div>
        <div class="mb-6">
        <label for="bewertung" class="block text-left mb-1">Bewertung</label>

        <select name="bewertung" id="bewertung" class="input " required>
            <option value="" >Bitte eine Bewertung auswählen</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" @selected(old('bewertung') == $i)>{{ $i }}</option>
            @endfor
        </select>
        </div>
        <a href="{{ route('buchs.show', $buch) }}" class="abbrechenbtn float-left">Abbrechen</a>
        <button type="submit" class="createbtn float-right">Rezension erstellen</button>
    </form>
    </div>
</div>
