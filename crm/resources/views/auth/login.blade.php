@extends('layouts.app')

@section('title', 'Login')

@include('includes.nav')

@section('heading', 'Login')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>

        <div>
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Login
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
        </div>
    </form>

@endsection
