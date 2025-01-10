@extends('layouts.app')
@section('content')
    <h1>Login</h1>
    @if (session('error'))
        <div class="alert alert-warning ">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ url('/login') }}" method="post">
        @csrf
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
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ route('password.request') }}">Forgot password</a>
@endsection
