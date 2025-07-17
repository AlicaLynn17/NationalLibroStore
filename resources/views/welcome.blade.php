@extends('layouts.app')

@section('title', 'Welcome to National Libro Store')

@section('content')

<div style="text-align: center; margin-bottom: 2rem;">
    <h1 style="color: white;">Welcome to National Libro Store</h1>
    <p style="color: white;">Discover your next favorite book from our extensive collection</p>
</div>

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
            <p>No books available yet.</p>
        </div>
    @endforelse
</div>
@endsection