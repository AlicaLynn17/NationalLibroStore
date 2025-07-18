@extends('layouts.showbook')

@section('title', $book->title)

@section('content')
<div style="display: grid; grid-template-columns: 300px 1fr; gap: 2rem; align-items: start;">
    <div>
        <a href="{{ route('home') }}" class="btn-back" style=" margin-bottom: 1rem; margin-top: 30px; width: max-content; padding: 4px 12px; font-size: 0.95rem;">
            <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> Back to Home</a>
        <div class="book-cover" style="height: 450px; margin-top: 1rem; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; width: 100%;">
            @if($book->cover_image)
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" style="width: 250px; height: auto; display: block;">
            @else
                No Cover Available
            @endif
        </div>
    </div>
    
    <div style="margin-top: 6rem; margin-bottom: 3rem;">
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
        
        <a href="#" class="btn" style="margin-top: 2rem; display: inline-block; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.27); width: 200px; text-align: center;">
            <i class="fa fa-shopping-cart" style="margin-right: 6px; "></i> Buy Book
        </a>
        <!-- <a href="{{ route('home') }}" class="btn" style="margin-top: 1rem;">Back to Home</a> -->
    </div>
</div>
@endsection