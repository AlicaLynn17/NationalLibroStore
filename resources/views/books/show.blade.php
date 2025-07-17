@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div style="display: grid; grid-template-columns: 300px 1fr; gap: 2rem;">
    <div>
        <div class="book-cover" style="height: 400px;">
            @if($book->cover_image)
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" style="max-width: 100%; max-height: 100%;">
            @else
                No Cover Available
            @endif
        </div>
    </div>
    
    <div>
        <h1>{{ $book->title }}</h1>
        <h2 style="color: #666; margin-bottom: 1rem;">by {{ $book->author }}</h2>
        
        @if($book->price)
            <div style="font-size: 1.5rem; color: #e74c3c; font-weight: bold; margin-bottom: 1rem;">
                ${{ number_format($book->price, 2) }}
            </div>
        @endif
        
        @if($book->genre)
            <p><strong>Genre:</strong> {{ $book->genre }}</p>
        @endif
        
        @if($book->publication_year)
            <p><strong>Published:</strong> {{ $book->publication_year }}</p>
        @endif
        
        @if($book->isbn)
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        @endif
        
        @if($book->description)
            <div style="margin-top: 1.5rem;">
                <h3>Description</h3>
                <p>{{ $book->description }}</p>
            </div>
        @endif
        
        <a href="{{ route('home') }}" class="btn" style="margin-top: 1rem;">Back to Home</a>
    </div>
</div>
@endsection