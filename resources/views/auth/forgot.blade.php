@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <button type="submit">Send Password Reset Link</button>
        <a href="{{ route('form.login') }}">Login</a>
        <a href="{{ route('form.register') }}">Register</a>
    </form>
@endsection
