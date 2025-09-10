@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-3xl  underline underline-offset-3">Die Bücher</h1>

    <form method="GET" action="{{ route('buchs.index') }}" class="mb-4 flex items-center space-x-2">
        <input type="text" name="title" placeholder="Suche nach Titel" class="input h-10"
               value="{{ request('title') }}">
        <button type="submit" class="btn h-10">Suchen</button>
        <a href="{{ route('buchs.index') }}" class="btn h-10">Leeren</a>
    </form>

    <ul>
        @forelse ($buchs as $buch)
            <li class="mb-4">
            <div class="book-item">
                <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                    <a href="{{ route('buchs.show', $buch) }}" class="book-title">{{ $buch->title }}</a>
                    <span class="book-author">by {{ $buch->autor }}</span>
                </div>
                <div>
                    <div class="book-rating">
                      {{ number_format($buch->rezension_avg_bewertung, 1) }}
                    </div>
                    <div class="book-review-count">
                      von {{ $buch->rezension_count }} {{ Str::plural('rezension', $buch->rezension_count) }}
                    </div>
                </div>
                </div>
            </div>
            </li>
        @empty
            <li class="mb-4">
            <div class="empty-book-item">
                <p class="empty-text">Keine Bücher gefunden</p>
                <a href="{{ route('buchs.index') }}" class="reset-link">Kriterien zurücksetzen</a>
            </div>
            </li>

        @endforelse
    </ul>
@endsection
