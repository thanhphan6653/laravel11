<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Mail\EmailResetPassword;
use App\Mail\EmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function sendVerificationEmail($user)
    {
        $token = JWTAuth::fromUser($user);

        try {
            Mail::to($user->email)->send(new EmailVerification($token));
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to send email.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = auth('api')->user();

        if (!$user->email_verified_at) {
            $this->sendVerificationEmail($user);

            return response()->json([
                'message' => 'Please verify email before login!',
            ], 403);
        }

        if ($user->deleted_at) {
            return response()->json([
                'message' => 'Account is disable.',
            ], 401);
        }

        return response()->json([
            'message' => 'Login successfully.',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ], 200);
    }

    public function register(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'Register failed. Please try again.'
            ], 500);
        }

        $this->sendVerificationEmail($user);

        return response()->json([
            'message' => 'Register successfully. Please verify email to continue.',
            'data' => $user,
        ], 200);
    }

    public function verifyEmail()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if ($user->email_verified_at) {
                return response()->json([
                    'message' => 'Email is already verified.'
                ], 200);
            }

            $user->email_verified_at = now();
            $user->save();

            return response()->json([
                'message' => 'Email verified successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred.'
            ], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Email address does not exist.'
            ], 404);
        }

        $token = JWTAuth::fromUser($user);

        Mail::to($user->email)->send(new EmailResetPassword($token));

        return response()->json([
            'message' => 'Password reset email sent. Please check email.',
            'token' => $token,
            'reset_password_url' => url('/api/auth/reset-password/' . $token),
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|max:20|confirmed',
        ]);

        $user = JWTAuth::parseToken()->authenticate();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Reset password successfully.',
            'data' => $user,
        ], 200);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);

        return response()->json([
            'message' => 'Logout successfully.',
        ], 200);
    }
}
