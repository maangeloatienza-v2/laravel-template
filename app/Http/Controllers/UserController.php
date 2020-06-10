<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Fetch UserResource to return the defined data

    public function index(){
        return UserResource::collection(User::paginate(10));
    }

    public function store(Request $request){

    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function update(Request $request, User $user){
        if($request->user()->id !== $user->id){
            return response()->json([
                'message' => 'Can\'t a user which is not yours',
                'error' => 'Invalid request'
            ]);
        }

        $user->update($request->only([
            'first_name',
            'last_name',
            'role_id'
        ]));

        return new UserResource;
    }

    public function delete(User $user){
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!',
            'context' => 'Data deletion success'
        ], 204);
    }
}
