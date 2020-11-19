<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use App\Model\User;

class Authentication extends Controller
{
   protected $jwt;

   public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function Login(Request $request)
    {

      if(empty($request->input('userid')) || empty($request->input('password')))
        {
          return response()->json(['status' => 0, "messaage" => "Invalid request"],500);
        }
       
       

    	$this->validate($request, [
            'userid'    => 'required|max:255',
            'password' => 'required',
        ]);

        try {

              if (! $token = $this->jwt->attempt($request->only('userid', 'password'))) {
                    return response()->json(['user_not_found'], 404);
                }

            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        $userid = $request->input('userid');
        $password = $request->input('password');
        $token_data = compact('token');
        $token = $token_data['token'];
        $results = DB::select("SELECT * FROM users where userid='$userid'");

        return response()->json([
                'id'            => $results[0]->id,
                'fullName'      => $results[0]->fullName ? $results[0]->fullName : "none",
                'userName'      => $results[0]->userid,
                'type'          => $results[0]->type,
                'chip_settings' => 'chip setting',
                'chips'         => '',
                'contact_no'    => '8750010918',
                'created_at'    => date('Y-m-d H:i:s', strtotime($results[0]->created_at)),
                'liability'     => '',
                'rate_diff'     => '',
                "token"         => $token,
                'success'       => 1
            ], 200);
    }
}
