@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<h1>Search Results</h1>
@if($query)
    <p>Results for: "<strong>{{ $query }}</strong>"</p>
@endif

<div class="book-grid">
    @forelse($books as $book)
        <div class="book-card">
            <div class="book-cover">
                @if($book->cover_image)
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" style="max-width: 100%; max-height: 100%;">
                @else
                    No Cover
                @endif
            </div>
            <div class="book-title">{{ $book->title }}</div>
            <div class="book-author">by {{ $book->author }}</div>
            @if($book->price)
                <div class="book-price">${{ number_format($book->price, 2) }}</div>
            @endif
            <a href="{{ route('books.show', $book->id) }}" class="btn" style="margin-top: 10px;">View Details</a>
        </div>
    @empty
        <div style="grid-column: 1/-1; text-align: center; color: #666;">
            <p>No books found matching your search.</p>
        </div>
    @endforelse
</div>
@endsection