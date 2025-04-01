<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function helloWorld()
    {
        return response()->json("Hello World"); // Return JSON response
    }
}
