<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\My_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = Auth::user()->createToken('MyAppToken')->accessToken;

        return response()->json(['token' => $token]);
    }

    public function profile(Request $request)
    {
        return response()->json(
            ['data' => [
                'user' => Auth::user(),
                'my_Books'=>Auth::user()->myBooks()->with('book')->get()->count(),
                'my_finished_Books'=>Auth::user()->myBooks()->with('book')->where('isFinished',true)->get()->count(),

            ],
            ]);
//            $request->user());
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        $token = $user->createToken('MyAppToken')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Revoke current access token
        $user->token()->revoke();

        return response()->json([
            'message' => 'Logged out successfully',
            'code' => 200
        ]);
    }
}
