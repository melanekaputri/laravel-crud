<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function profile($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile',['guru' => $guru]);
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_guru = \App\Guru::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_guru = \App\Guru::all();
        }
        return view('guru.index',['data_guru'=>$data_guru]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nip'    => 'required|min:5',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
        ]);
        
        // Insert ke tabel user
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('123456789'); 
        $user->remember_token = str_random(60);
        $user->save();

        // Insert ke tabel guru
        $request->request->add(['user_id' => $user->id ]);
        \App\Guru::create($request->all());
        return redirect('/guru')->with('success','Berhasil menambahkan data siswa!');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('guru/edit',['guru' => $guru]);

    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $guru = Guru::find($id);
        $guru->update($request->all());
        
        return redirect('/guru')->with('success','Data berhasil di Update!');
    }

    public function delete($id)
    {
        $guru = Guru::find($id);
        $guru->delete($guru);
        return redirect('/guru')->with('success','Data berhasil dihapus!');
    }

    public function addmapel(Request $request,$idguru)
    {
        $guru = \App\Guru::find($idguru);
       
        $guru->mapel()->attach($request->mapel,['nama' => $request->nama]);

        return redirect('siswa/'.$idguru.'/profile')->with('success','Nilai berhasil ditambahkan!');

    }
}
