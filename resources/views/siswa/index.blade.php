@extends('layouts.master')
<title>Siswa | Data Siswa</title>
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
                            <h3 class="panel-title">Data Siswa</h3>
                            <div class="right">
                                <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export to Excel</a>
                                <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export to PDF</a>
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="btn btn-sm btn-primary">Tambah Data</i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA LENGKAP</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>RATA-RATA</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data_siswa as $siswa)
                                        <tr>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_lengkap() }}</a></td>
                                        {{-- <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td> --}}
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ $siswa->agama }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->rataNilai()}}</td>
                                            <td>
                                                <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Detele</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/siswa/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : '' }}">
              <label for="nama_depan">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                @if($errors->has('nama_depan'))
                        <span class="help-block">{{$errors->first('nama_depan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_belakang') ? 'has-error' : '' }}">
                <label for="nama_belakang">Nama Belakang</label>
                <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                    @if($errors->has('nama_belakang'))
                        <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                  <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? 'selected': ''}}>Laki-laki</option>
                  <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? 'selected': ''}}>Perempuan</option>
                </select>
                    @if($errors->has('jenis_kelamin'))
                         <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('agama') ? 'has-error' : '' }}">
                <label for="agama">Agama</label>
                <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                    @if($errors->has('agama'))
                        <span class="help-block">{{$errors->first('agama')}}</span>
                    @endif
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3">{{old('alamat')}}</textarea>
            </div>
            <div class="form-group {{$errors->has('avatar') ? 'has-error' : '' }}">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control">
                @if($errors->has('avatar'))
                        <span class="help-block">{{$errors->first('avatar')}}</span>
                @endif
            </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</div>    
@stop

@section('footer')
    <script>
        $('.delete').click(function(){
            var siswa_id = $(this).attr('siswa-id');
            swal({
                title: "Yakin Ingin Menghapus Data Ini?",
                text: "Data siswa dengan ID "+ siswa_id +" akan dihapus!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/siswa/"+siswa_id+"/delete";
                }
            });
        });
    </script>
@endsection