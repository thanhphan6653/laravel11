@extends('layouts.app')
@section('content')
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Reset Password</button>
    </form>
@endsection
