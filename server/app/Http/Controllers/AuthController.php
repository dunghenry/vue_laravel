<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response($users);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return response($user);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                "message" => "Login failed",
            ]);
        }

        $token = $user->createToken("token")->plainTextToken;
        return response([
            "user" => $user,
            "token" => $token,
        ]);
    }

    public function user()
    {
        // return Auth::user();
    }
}
