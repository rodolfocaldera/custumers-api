<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegistroMiddleware
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:custumers',
            'dni' => 'required|numeric|unique:custumers',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'address' => 'regex:/^[a-zA-Z0-9#,.\s]+$/',
            'id_reg' => 'required|numeric',
            'id_com' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json([ 'message' =>  "Verifica que los datos ingresados tengan el formato correcto o no exista un correo o DNI activo en los datos enviados",'success' => false], Response::HTTP_NOT_FOUND); 
        }

        $related = DB::table("communes")
            ->join('region', 'communes.id_reg', '=', 'region.id')
            ->where("communes.id",$request->id_com)
            ->where("communes.status","A")
            ->where("region.status","A")
            ->where("communes.id_reg",$request->id_reg)
            ->exists();

        if(!$related){
            return response()->json([ 'message' => 'Commune y región no estan relacionadas o están desactivadas' ,'success' => false], Response::HTTP_NOT_FOUND); 
        }

        return $next($request);
    }
}
