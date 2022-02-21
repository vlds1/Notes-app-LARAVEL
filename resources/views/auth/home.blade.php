@extends('./auth/layouts/auth')

@section('title', 'Notes')

@section('content')
<div class="navbar">
    <div class="container">
        <div class="navbar-inner">    
            <div class="logo">Logo</div>
            <nav class="navigation">
                <ul>
                    <li><a href="{{ route('auth.login') }}">Sign in</a></li>
                    <li><a href="{{ route('auth.register') }}">Register</a></li>
                </ul>
            </nav>
        </div>
    </div>    
</div>
@endsection