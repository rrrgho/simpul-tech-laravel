<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ResponseHandler;

class UserController extends Controller
{
    public function login(Request $request){
        $user = User::where([
            ['deleted_at',null],
            ['email', $request->email]
        ])->first();
        
        if($user){
            if(Hash::check($request->password, $user->password)){
                $access_token = $user->createToken('nApp')->accessToken;
                $user_data = [
                    'name' => $user->name,
                    'user_id' => $user->id,
                ];
                return response()->json([
                    'data' => $user_data,
                    'access_token' => $access_token
                ], 200);
            }else{
                return response()->json([
                    'message' => 'Wrong password',
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'Username not found',
            ], 400);
        }
    }
}
