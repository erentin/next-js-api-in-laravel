<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))){

            return response([
                'message' => "Invalid Credentials!"
            ], 403);

        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24); // 1 Day

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }

    public function register(Request $request)
    {
        // dd(json_decode($request->getContent()));
        // dd($request->name);

        if($request->password ===  $request->password_confirmation){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return "User Stored:" . $user;

        }else{
            return "Password Not Confirmated!";
        }

    }

    public function user()
    {
        return "Authenticated User!";
    }

}
