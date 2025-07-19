@extends('layouts.searchbar')

@section('title', 'Search Results')

@section('content')

<a href="{{ route('home') }}" class="btn-home" style="margin-top: 20px; width: max-content;">
    <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> Back to Home</a>

<div id="no-books-message"></div>
<div class="book-grid" id="book-grid">
    {{-- Initial book cards will be rendered by JS --}}
</div>

<script>
    // Prepare book data for JS (pass all needed fields)
    const books = @json($books);

    function renderBooks(filteredBooks) {
        const grid = document.getElementById('book-grid');
        const message = document.getElementById('no-books-message');
        grid.innerHTML = '';
        message.innerHTML = '';
        if (filteredBooks.length === 0) {
            message.innerHTML = `
                <div class="book-none" style="background-color: #ede9d0; width: 100%; margin: 2rem auto 15rem auto; border-radius: 8px; padding: 2rem 1rem; text-align: center; display: flex; justify-content: center;">
                    <p style="font-size: 1.2rem; color: #000; font-weight: bold; margin: 0;">No books found matching your search.</p>
                </div>
            `;
            return;
        }
        filteredBooks.forEach(book => {
            grid.innerHTML += `
                <div class="book-card">
                    <div class="book-cover">
                        ${book.cover_image ? `<img src="${book.cover_image}" alt="${book.title}" style="max-width: 100%; max-height: 100%;">` : 'No Cover'}
                    </div>
                    <div class="book-title">${book.title}</div>
                    <div class="book-author">by ${book.author}</div>
                    ${book.price ? `<div class="book-price">$${parseFloat(book.price).toFixed(2)}</div>` : ''}
                    <a href="/books/${book.id}" class="btn" style="margin-top: 10px;">View Details</a>
                </div>
            `;
        });
    }

    // Initial render
    renderBooks(books);

    document.getElementById('live-search').addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        const filtered = books.filter(book =>
            book.title.toLowerCase().includes(query) ||
            book.author.toLowerCase().includes(query) ||
            (book.genre && book.genre.toLowerCase().includes(query))
        );
        renderBooks(filtered);
    });
</script>
@endsection