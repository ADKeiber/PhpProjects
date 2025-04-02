<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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


        $user = User::where('username', $request -> username)->first();

        if(!$user || !Hash::check($request -> password, $user -> password)){
            return response() -> json(['error' => 'Invalid credentials'], 401)
        }
        
        $token = $user -> createToken('auth_token') -> plainTextToken;
        return response()->json( [
            'message' => 'Login successful',
            'token' => $token
        ]);
    }
}
