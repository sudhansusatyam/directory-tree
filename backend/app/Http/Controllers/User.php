<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function creatUser(Request $request)
    {
    	 print_r($request->input());
    }
}
