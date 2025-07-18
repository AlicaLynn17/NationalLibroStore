
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'National Libro Store')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Merriweather', Arial,
            sans-serif; line-height: 1.6; 
            color: #333;
            background-image: url('{{ asset('nlb1.png') }}');
            background-size: cover; 
            background-position: center top; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }

        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 0 20px; }

        .container-books {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            background-color: white;
            border-radius: 8px; 
            margin-bottom: 20px;
        }
        
        header { 
            background: white; 
            color: white;
            padding: 0.5rem 0; 
            background: #ede9d0; 
        }

        .header-content { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: bold; text-decoration: none; color: white; }
        
        .search-form { 
            display: flex; 
            gap: 10px; 
            width: 100%;
            max-width: 700px;
            justify-content: center;
            align-items: center;
            
        }

        .search-input { 
            padding: 8px 16px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            flex: 1;
            font-size: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.27);
        }

        .search-btn { 
            padding: 8px 16px; 
            background: #EF3929; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.27);
        }

        .search-btn:hover { background: #821e15ff; }
        
        main { 
            padding: 4rem 0; 
            min-height: 60vh; 
        }
        
        .book-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 2rem; }
        .book-card { 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            padding: 15px; 
            text-align: center; 
            transition: transform 0.2s; 
            background-color: white; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .book-card:hover { transform: translateY(-5px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .book-cover { 
            width: 100%; 
            height: 200px; 
            background: white; 
            border-radius: 4px; 
            margin-bottom: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: 
                center; color: #666; }

        .book-title { 
            font-weight: bold; 
            margin-bottom: 5px;
        }

        .book-author { color: #666; margin-bottom: 10px; }
        .book-price { 
            color: #b76a00; 
            font-weight: bold; }
        
        /* footer { 
            background: #34495e; 
            color: white; 
            text-align: center; 
            padding: 2rem 0;
            flex-shrink: 0;
        } */
        
        .book-details-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
             gap: 2rem;
             align-items: start;
        }
        
        .btn 
        { display: inline-block; 
          padding: 8px 16px; 
          background: #EF3929; 
          color: white; 
          text-decoration: none; 
          border-radius: 4px; 
        }

        .btn-back
        { display: inline-block; 
          padding: 8px 16px; 
          background: #6e1d16ff; 
          color: white; 
          text-decoration: none; 
          border-radius: 4px; 
        }

        .btn:hover 
        { background: #c12f22ff; 
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('National Libro Store.png') }}" alt="National Libro Store" style="height: 80px; width: auto;">
                </a>
                <form action="{{ route('books.search') }}" method="GET" class="search-form">
                    <input type="text" name="query" class="search-input" placeholder="Search for books...">
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container-books">
            @yield('content')
        </div>
    </main>
</body>
</html>