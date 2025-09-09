@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-3xl underline-offset-4">Bücher</h1>

    <form action=""></form>

    <ul>
        @forelse ($buchs as $buch)
            <li class="mb-4">
            <div class="book-item">
                <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                    <a href="#" class="book-title">Book Title</a>
                    <span class="book-author">by Piotr Jura</span>
                </div>
                <div>
                    <div class="book-rating">
                    3.5
                    </div>
                    <div class="book-review-count">
                    out of 5 reviews
                    </div>
                </div>
                </div>
            </div>
            </li>
        @empty
        

        @endforelse
    </ul>
@endsection
