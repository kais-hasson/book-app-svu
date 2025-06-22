<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        echo $request->role_id;
        if ($request->has('role_id')) {
           return Roles::query()->find($request->role_id)->with('user')->get();
        }
        return Roles::with('user')->get();
//        return Auth::user()->with('role')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);
        $roles = new Roles();
        $roles->role_name = $request->input('role_name');
        $roles->save();
        return Response()->json(["data" => $roles, "status" => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Roles::with('user')->find($id);

        if (! $role) {
            return response()->json([
                'message' => 'Book not found.',
                'code' => 404,
            ], 404);
        }

        return response()->json([
            'data' => $role,
            'status' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterolesRequest $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
