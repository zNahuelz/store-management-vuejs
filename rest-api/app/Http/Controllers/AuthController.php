<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Store;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:5', 'max:20'],
            'password' => ['required', 'string', 'min:5', 'max:20'],
        ]);
        $token = Auth::guard('api')->attempt($request->only('username', 'password'));
        if (!$token) {
            return response()->json([
                'message' => 'Incorrect credentials.'
            ], 401);
        }

        $user = Auth::guard('api')->user();
        $user->load('role','store');

        return response()->json([
            'message' => 'Login succesfully.',
            'auth' => [
                'token' => $token,
                'type' => 'Bearer',
                'store' => $user->store,
                'role' => $user->role,
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:60'],
            'surname' => ['required', 'string', 'min:3', 'max:60'],
            'username' => ['required', 'string', 'min:5', 'max:20'],
            'email' => ['required', 'email', 'max:60'],
            'password' => ['required', 'min:5', 'max:20', 'string'],
            'store_id' => ['required', 'numeric'],
            'role_id' => ['required', 'numeric'],
        ]);
        $store = Store::find($request->store_id);
        $role = Role::find($request->role_id);
        if ($store && $role) {
            $user = User::create([
                'name' => strtoupper($request->name),
                'surname' => strtoupper($request->surname),
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'store_id' => $request->store_id,
                'role_id' => $request->role_id,
            ]);

            $token = Auth::guard('api')->login($user);
            return response()->json([
                'message' => 'User registered succesfully.',
                'auth' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    'store' => $user->store, //Check this!!
                    'role' => $user->role,
                ]], 201);
        }
        return response()->json([
            'message' => 'Failed to register user. Store or role not found.'
        ], 400);
    }

    public function profile()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'message' => 'Error! Invalid or expired token.'
            ], 401);
        }
        $user->load('role','store');
        return response()->json($user);
    }
}
