@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                    {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                    <h3 class="panel-title">Edit Data Guru</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/guru/{{$guru->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="nip">Nip</label>
                                    <input name="nip" type="text" class="form-control" id="nip" aria-describedby="emailHelp" placeholder="Nip" value="{{$guru->nip}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Nama" value="{{$guru->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                          <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                          <option value="P" @if($guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input name="telepon" type="text" class="form-control" id="telepon" aria-describedby="emailHelp" placeholder="Telepon" value="{{$guru->telepon}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{$guru->agama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$guru->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection