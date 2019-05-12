<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_user = User::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_user = User::all();
        }
        return view('user.index',['data_user'=>$data_user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit',['user' => $user]);

    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/user')->with('success','Data berhasil di Update!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/user')->with('success','Data berhasil dihapus!');
    }

    public function create(Request $request)
    {
         // Insert ke tabel user
         $user = new User;
         $user->role = $request->role;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password); 
         $user->remember_token = str_random(60);
         $user->save();

         return redirect('/user')->with('success','Berhasil menambahkan data user!');
 
    }
}
