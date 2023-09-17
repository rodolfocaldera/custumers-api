<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function save(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->save();
        return response()->json([ 'message' => 'Usuario registrado correctamente' ,'success' => true], Response::HTTP_CREATED); 
    }
}
