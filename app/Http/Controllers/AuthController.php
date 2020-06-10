<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    //

    public function register(Request $request){
        $user = User::create(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'user_type_id' => $request->user_type_id
                // 'role_id' => $request->role_id
            ]
        );

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request){
        $data = $request->only(['email','password']);

        if (!$token = auth()->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

      return $this->respondWithToken($token);
    }

    public function respondWithToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer '.$token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
