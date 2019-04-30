<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
class MapelController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_mapel = Mapel::where('nama','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_mapel = Mapel::all();
        }
        return view('mapel.index',['data_mapel'=>$data_mapel]);
    }
}
