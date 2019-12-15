@extends('layouts.app')

@section('title', 'Register')

@include('includes.nav')

@section('heading', 'Register')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

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

        <!-- For creating a customer -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        </div>

        <div class="form-group">
            <label for="address_line_1">Address Line 1</label>
            <input id="address_line_1" type="text" class="form-control" name="address_line_1" value="{{ old('address_line_1') }}" required autocomplete="address_line_1" autofocus>
        </div>

        <div class="form-group">
            <label for="address_line_2">Address Line 2:</label>
            <input id="address_line_2" type="text" class="form-control" name="address_line_2" value="{{ old('address_line_2') }}" autocomplete="address_line_2" autofocus>
        </div>

        <div class="form-group">
            <label for="postcode">Postcode:</label>
            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
        </div>

        <div class="form-group">
            <label for="contact_telephone_number">Telephone Number:</label>
            <input id="contact_telephone_number" type="text" class="form-control" name="contact_telephone_number" value="{{ old('contact_telephone_number') }}" required autocomplete="contact_telephone_number" autofocus>
        </div>

        <div class="form-group mb-4">
            <label for="customer_type">Type:</label>
            <select class="form-control" name="customer_type" id="customer_type">
                <option value="0">Research</option>
                <option value="1">Education</option>
                <option value="2">Other</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input id="is_newsletter_subscriber" name="is_newsletter_subscriber" class="form-check-input" type="checkbox">
            <label for="is_newsletter_subscriber">Would you like to receive our newsletter?</label>
        </div>

        <div>
            <p>Already got an account? <a href="{{ route('login') }}">Login here</a>.</p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </form>
@endsection
