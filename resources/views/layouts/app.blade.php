<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'National Libro Store')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        header { background: #2c3e50; color: white; padding: 1rem 0; }
        .header-content { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: bold; text-decoration: none; color: white; }
        
        .search-form { display: flex; gap: 10px; }
        .search-input { padding: 8px; border: none; border-radius: 4px; width: 300px; }
        .search-btn { padding: 8px 16px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .search-btn:hover { background: #2980b9; }
        
        main { padding: 2rem 0; min-height: 60vh; }
        
        .book-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 2rem; }
        .book-card { border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; transition: transform 0.2s; }
        .book-card:hover { transform: translateY(-5px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .book-cover { width: 100%; height: 200px; background: #f8f9fa; border-radius: 4px; margin-bottom: 10px; display: flex; align-items: center; justify-content: center; color: #666; }
        .book-title { font-weight: bold; margin-bottom: 5px; }
        .book-author { color: #666; margin-bottom: 10px; }
        .book-price { color: #e74c3c; font-weight: bold; }
        
        footer { background: #34495e; color: white; text-align: center; padding: 1rem 0; margin-top: 2rem; }
        
        .btn { display: inline-block; padding: 8px 16px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">National Libro Store</a>
                <form action="{{ route('books.search') }}" method="GET" class="search-form">
                    <input type="text" name="q" placeholder="Search books, authors, genres..." class="search-input" value="{{ request('q') }}">
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 National Libro Store. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>