<?php

namespace App\Http\Controllers;

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



        return response()->json( $request -> password); // Return JSON response
    }
}
