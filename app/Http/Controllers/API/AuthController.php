<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\My_book;
use App\Models\Roles;
use App\Models\User;
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
                'user' => User::with('role')->where('id',Auth::id()) ->get(),
                'my_Books'=>Auth::user()->myBooks()->with('book')->get()->count(),
                'my_finished_Books'=>Auth::user()->myBooks()->with('book')->where('isFinished',true)->get()->count(),

            ],
            ]);
//            $request->user());
    }  public function profiles(Request $request)
{
    return response()->json(
        ['data' => [
            'user' => User::with('role') ->get(),
            'my_Books'=>Auth::user()->myBooks()->with('book')->get()->count(),
            'my_finished_Books'=>Auth::user()->myBooks()->with('book')->where('isFinished',true)->get()->count(),

        ],
        ]);
//            $request->user());
} public function users(Request $request)
{
    $userWithRole =

        User::with('role') ->get();
//            'my_Books'=>Auth::user()->myBooks()->with('book')->get()->count(),
//            'my_finished_Books'=>Auth::user()->myBooks()->with('book')->where('isFinished',true)->get()->count(),
    $roles=Roles::all();

    return view('users',['users'=>$userWithRole ,'roles'=>$roles ]);

//            $request->user());
}
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 1,
        ]);

        $token = $user->createToken('MyAppToken')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }
    public function updateUserRole(Request $request)
    {
        $fields= $request->validate([
            'id' => 'required',
            'role_Id'=>'required'
        ]);
        try {
            $user = User::findOrFail($fields['id']);
            $user->role_id = $fields['role_Id'];
            $user->save();
            return Response()->json([ 'message' => 'Role updated successfully',"data" => $user, "status" => 200]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update role',
                'error' => $e->getMessage(),
                'status' => 500,
            ], 500);}

//        $user = \App\Models\User::update([
//            'role_Id' => $request->role_Id,
//        ]);

//        $token = $user->createToken('MyAppToken')->accessToken;

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
