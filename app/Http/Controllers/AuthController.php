<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccessToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }

            $check = Hash::check($request->password, $user->password);
            if (!$check) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }
            
            $texto = Str::random(200);
            $time = time();
            $token_exists = AccessToken::where("expires_at",">",$time)->first();
            $accessToken = null;
            if(!$token_exists){
                $expira = date("Y-m-d H:i:s", strtotime('+ 24 hours'));

                $token = [
                    "email" => $user->email,
                    "inicio_sesion" => $time,
                    "texto" => $texto,
                    "expira" => $expira
                ];

                $token = sha1(json_encode($token));

                $accessToken = AccessToken::updateOrCreate(
                    [ 'user_id' => $user->id ],
                    [ 'access_token' => $token, 'expires_at' =>$expira ]
                );
            }else{
                $accessToken = $token_exists;
            }
            
            return response()->json([ 'access_token' =>  $accessToken->access_token ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(Request $request)
    {
        try {
            $accessToken = AccessToken::where('access_token', $request->access_token)->first();
            if ($accessToken) {
                $accessToken->delete();
                return response()->json([ 'success' => true ]);
            }
            
            return response()->json([ 'success' => false ]); 
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}