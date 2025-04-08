<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function helloWorld(){
        return response()->json("Hello World"); // Return JSON response
    }

    public function login(Request $request){
        
        // Validate input
        $request -> validate([
            'username' => 'required|string',
            'password'=> 'required|string',
        ]);

        // used to find first one
        $user = User::where('username', $request -> username)->first();
        
        //makes sure user password is as expected
        if(!$user || !Hash::check($request -> password, $user -> password)){
            return response() -> json(['error' => 'Invalid credentials'], 401);
        }
        
        $token = $user -> createToken('auth_token') -> plainTextToken;
        return response()->json( [
            'message' => 'Login successful',
            'token' => $token
        ]);
    }

    public function create(Request $request){
        $request -> validate([
            'username' => 'required|string',
            'password'=> 'required|string|min:6',
        ]);
        User::create([
            'username' => $request -> username,
            'password'=> Hash::make($request -> password) 
        ]);

        return response()->json($user, 201);
    }
}
