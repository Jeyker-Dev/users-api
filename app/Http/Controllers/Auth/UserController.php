<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Returns all users
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json(['Users: ' => $users], 200);
    }

    /**
     * Return an user by a specific id
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $user = User::findOrFail($id);

        return response()->json(['User:' => $user], 200);
    }

    /**
     * Create a new user
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => 'User created successfully.', 'user' => $user], 200);
    }
}
