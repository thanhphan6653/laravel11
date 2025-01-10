@extends('layouts.app')
@section('content')
    <h1>Register</h1>
    @if (session('error'))
        <div class="alert alert-warning ">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="{{ route('form.login') }}">Login</a>
@endsection
