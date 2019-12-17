@extends('layouts.app')

@section('title', 'Create Admin')

@include('includes.nav')

@section('heading', 'Create Admin')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Let the controller know we are registering a customer -->
        <input type="hidden" name="role_constant" value="ADMINISTRATOR">

        <!-- For creating a user -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password:</label>
            <input id="password-confirm" type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirm')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </form>
@endsection
