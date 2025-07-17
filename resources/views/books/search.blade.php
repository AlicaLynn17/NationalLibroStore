@extends('layouts.app')

@section('title', 'Search Results')

@section('content')

<div class="book-grid" id="book-grid">
    {{-- Initial book cards will be rendered by JS --}}
</div>

<script>
    // Prepare book data for JS (pass all needed fields)
    const books = @json($books);

    function renderBooks(filteredBooks) {
        const grid = document.getElementById('book-grid');
        grid.innerHTML = '';
        if (filteredBooks.length === 0) {
            grid.innerHTML = '<div style="grid-column: 1/-1; text-align: center; color: #666;"><p>No books found matching your search.</p></div>';
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