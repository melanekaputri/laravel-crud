@extends('layouts.master')

@section('content')
<h1>Edit Data Siswa</h1>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                    {{session('success')}}
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-12">
                        <form action="/siswa/{{$siswa->id}}/update" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                              <label for="nama_depan">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                  <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                  <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                </div>
            </div>
@endsection

