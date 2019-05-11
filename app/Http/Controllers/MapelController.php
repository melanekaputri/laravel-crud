<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_mapel = Mapel::where('nama','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_mapel = Mapel::all();
            $data_guru = Guru::all();
        }
        return view('mapel.index',['data_mapel'=>$data_mapel,'data_guru'=>$data_guru]);
    }

    public function delete($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('success','Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        return view('mapel/edit',['mapel' => $mapel]);

    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $mapel = Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('success','Data berhasil di Update!');
    }

    public function create(Request $request)
    {
       
       
        Mapel::create($request->all());
        return redirect('/mapel')->with('success','Berhasil menambahkan data guru!');

       
        // return redirect('/mapel');
        
    }

}
