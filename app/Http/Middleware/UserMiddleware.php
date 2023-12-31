<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->path(); 
        $email_validate = $uri == "api/login" ? 'required|email' : 'required|email|unique:users';
        $validator = Validator::make($request->all(), [
            'email' => $email_validate,
            'password' => 'required|alpha_num'
        ]);

        if($validator->fails()){
            return response()->json([ 'message' => 'No se recibieron los datos esperados' ,'success' => false], Response::HTTP_NOT_FOUND); 
        }
        
        return $next($request);
    }
}
