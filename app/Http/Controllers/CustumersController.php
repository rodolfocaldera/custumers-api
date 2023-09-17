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
}
