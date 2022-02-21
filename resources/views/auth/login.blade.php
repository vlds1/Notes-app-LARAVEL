@extends('./auth/layouts/auth')

@section('title', 'Sign in')

@section('content')
    <div class="form">
        <div class="form-inner">
            <div class="title">Sign in</div>
            <div class="auth-form">
                <form class="auth-form-inner" method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="inputs">
                    <div class="input-field">
                        @error('email')
                        <div class="">{{ $message }}</div>
                        @enderror   
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="input-field">
                        @error('password')
                        <div class="">{{ $message }}</div>
                        @enderror  
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password">    
                    </div>
                </div>
                <div class="action">
                    <button class="btn" type="submit">Sign in</button>
                    <div class="dha">Don't have account? <a href="{{ route('auth.register') }}">Create</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection