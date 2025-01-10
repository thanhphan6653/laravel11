<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => '0987654321',
        ]);

        event(new Registered($user));

        return redirect()->route('form.login')->with('status', 'Please check your email to verify your account.');
    }

    public function verify($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('form.login')->with('status', 'Your email has been verified.');
        }

        return redirect()->route('form.login')->with('error', 'Invalid verification link.');
    }


    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('index');
            } else {
                Auth::logout();
                return redirect()->route('form.login')->with('error', 'Vui lòng xác thực email trước khi đăng nhập.');
            }
        }

        return redirect()->route('login', [Auth::user()->name])->with('error', 'Thông tin đăng nhập không chính xác.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('form.login');
    }

    public function showFormForgotPassword()
    {
        return view('auth.forgot');
    }

    public function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $response = Password::sendResetLink($validated);

        return $response == Password::RESET_LINK_SENT ? back()->with('status', Lang::get($response))
            : back()->withErrors(['email' => Lang::get($response)]);
    }

    public function showResetPassword(Request $request, $token = null)
    {
        return view('auth.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user) use ($request) {
            $user->password = Hash::make($request->password);
            $user->save();
        });

        return $response == Password::PASSWORD_RESET ? redirect()->route('form.login')->with('status', 'Your password has been reset')
            : back()->with('error', "The provided token is invalid.");
    }
}
