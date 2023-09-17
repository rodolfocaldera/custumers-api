<?php

namespace App\Http\Controllers;
use App\Models\Custumers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustumersController extends Controller
{
    public function get(){
        $custumers = DB::table('custumers')
        ->join('communes', 'custumers.id_com', '=', 'communes.id')
        ->join('region', 'custumers.id_reg', '=', 'region.id')
        ->where("custumers.status","A")
        ->select("name","last_name","address","communes.description as commune","region.description as region")
        ->get();
        return response()->json([ 'success' => true,'custumers' => $custumers ], Response::HTTP_ACCEPTED); 
    }

    public function delete(Request $request){
        $dni = $request->dni;
        $custumerDeleted = Custumers::where("status","Trash")->where("dni",$dni)->exists();
        $custumerExists = Custumers::where("dni",$dni)->exists();
        if($custumerDeleted || !$custumerExists){
            return response()->json([ 'success' => false,'message' => "Registro no existe" ], Response::HTTP_NOT_FOUND); 
        }

        Custumers::where("dni",$dni)->update(["status"=>"Trash"]);
        return response()->json([ 'success' => true,'message' => "Registro eliminado correctamente" ], Response::HTTP_ACCEPTED); 
    }
}
