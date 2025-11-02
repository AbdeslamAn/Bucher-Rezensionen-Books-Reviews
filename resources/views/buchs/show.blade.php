@extends('layouts.app')

@section('content')
  <div class="mb-4">
    <h1 class="mb-2 text-2xl text-center underline">{{ $buch->title }}</h1>

    <div class="book-info">
      <div class="book-author text-center mb-4 text-lg font-semibold">von {{ $buch->autor }}</div>
      <div class="book-rating flex items-center">
        <div class="mr-2 text-sm font-medium text-slate-700 ">

        <x-star-rezension :bewertung="$buch->rezension_avg_bewertung" />
        </div>
        <span class="text-center book-review-count  text-sm text-gray-500 ">
          {{ $buch->rezension_count }} {{ Str::plural('rezension', $buch->rezension_count) }}
        </span>
      </div>
    </div>
  </div>

  <div>
    <h2 class="mb-4 text-xl font-semibold text-center">Rezension</h2>
    <ul>
      @forelse ($buch->rezension as $rezension)
        <li class="book-item mb-4">
          <div>
            <div class="mb-2 flex items-center justify-between">
              <div class="font-semibold">
                <x-star-rezension :bewertung="$rezension->bewertung" /></div>
              <div class="book-review-count">
                {{ $rezension->created_at->format('M j, Y') }}</div>
            </div>
            <p class="text-gray-700">{{ $rezension->rezension }}</p>
          </div>
        </li>
      @empty
        <li class="mb-4">
          <div class="empty-book-item">
            <p class="empty-text text-lg font-semibold">Noch keine Rezension.</p>
          </div>
        </li>
      @endforelse
    </ul>
  </div>
@endsection
