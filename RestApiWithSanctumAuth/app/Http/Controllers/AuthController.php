<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $requests)
    {
        $field = $requests->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])

        ]);

        //create token
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return  response($response, 201);
    }
    public function login(Request $requests)
    {
        $field = $requests->validate([

            'email' => 'required|string|email',
            'password' => 'required|string|'
        ]);
        $user = User::where('email', $field['email'])->first();
        if (!$user || !Hash::check($field['password'], $user->password)) {
            return response([
                'message' => 'not matched',
            ], 201);
        }

        //create token
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return  response($response, 201);
    }

    public function logout(Request $requests)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'You are logged out'
        ];
    }
}
