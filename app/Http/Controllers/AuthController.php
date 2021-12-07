<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use PhpParser\Parser\Tokens;

class AuthController extends Controller
{
    public function register(Request $req) {

        $fields = $req->validate([
            'name' => 'required|string',
            'email'=> 'required|string|unique:users, email',
            'password' => 'required|string|confirmed'
        ]);


        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);


        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'status' => 'success'
        ];

        return response($response, 201);
    }

    public function login(Request $req) {
        $fields = $req->validate([
            'email'=> 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid'
            ], 401);
        }
        else {
            $token = $user->createToken('myAppTokenLogin')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token,
                'status' => 'success'
            ];

            return response($response, 201);
        }
    }

    public function logout(Request $request) {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        // auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
