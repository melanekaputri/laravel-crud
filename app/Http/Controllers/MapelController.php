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
        }
        return view('mapel.index',['data_mapel'=>$data_mapel]);
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
       
        // // dd($request->all());
        // $this->validate($request,[
        //     'kode'      => 'required|min:3',
        //     'nama'      => 'required',
        //     'jam_bulan' => 'required',
        //     'semester'  => 'required',
        // ]);

        // $mapel = new Mapel;
        // $mapel->kode = $request->kode;
        // $mapel->nama = $request->nama;
        // $mapel->jam_bulan = $request->jam_bulan;
        // $mapel->semester = $request->semester; 
        // $mapel->save();
        
        // // Insert ke tabel mapel
        // $request->request->add(['mapel_id' => $mapel->id ]);
        // $mapel = Mapel::create($request->all());
        // return redirect('/mapel')->with('success','Berhasil menambahkan data mata pelajaran!');

        // \App\Mapel::create($request->all());
        dd($request->all());
        Mapel::create([
            'kode' => request('kode'),
            'nama' => request('nama'),
            'jam_bulan' => request('jam_bulan'),
            'semester' => request('semester'),
            'guru_id' => request('id')
        ]);
       
        // return redirect('/mapel');
        
    }

}
