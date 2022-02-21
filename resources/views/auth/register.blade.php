@extends('./auth/layouts/auth')

@section('title', 'Registration')

@section('content')
<div class="form">
    <div class="form-inner">
        <div class="title">Registration</div>
        <div class="auth-form">
            <form class="auth-form-inner" method="POST" action="{{ route('auth.register') }}">
                @csrf
                @error('email')
                <div class="">{{ $message }}</div>
                @enderror    
                <div class="inputs">
                    <div class="input-field">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="input-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">    
                </div>
            </div>
            <div class="action">
                <button class="btn" type="submit">Register</button>
                <div class="dha">Have account? <a href="{{ route('auth.login') }}">Sign in</a></div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection