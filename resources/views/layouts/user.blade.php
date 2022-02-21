<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <div class="navbar-inner">    
                <div class="logo"><a href="{{ route('notes.index') }}">Notes</a></div>
                <nav>
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{ asset('img/search.png') }}" alt="search"><div class="">Seatch</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notes.create') }}">
                                <img src="{{ asset('img/create-note.png') }}" alt=""><div class="">Create</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('auth.logout') }}">
                                <img src="{{ asset('img/logout.png') }}" alt=""><div class="">Log out</div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>    
    </div>
    @yield('content')
</body>
</html>