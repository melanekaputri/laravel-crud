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
                            <h3 class="panel-title">Data Guru</h3>
                            <div class="right">
                                {{-- <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export to Excel</a>
                                <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export to PDF</a> --}}
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="btn btn-sm btn-primary">Tambah Data</i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>NAMA DOSEN</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>TELEPON</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data_guru as $guru)
                                        <tr>
                                            <td>{{ $guru->nip}}</td>
                                            <td><a href="/guru/{{$guru->id}}/profile">{{ $guru->nama }}</a></td>
                                            <td>{{ $guru->jenis_kelamin }}</td>
                                            <td>{{ $guru->telepon }}</td>
                                            <td>{{ $guru->agama }}</td>
                                            <td>{{ $guru->alamat }}</td>
                                            <td>
                                                <a href="/guru/{{ $guru->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" guru-id="{{$guru->id}}">Detele</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/guru/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('nip') ? 'has-error' : '' }}">
              <label for="nip">Nip</label>
            <input name="nip" type="text" class="form-control" id="nip" placeholder="Nip" value="{{old('nip')}}">
                @if($errors->has('nip'))
                        <span class="help-block">{{$errors->first('nip')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="nama" value="{{old('nama')}}">
                    @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
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
            <div class="form-group {{$errors->has('telepon') ? 'has-error' : '' }}">
                <label for="telepon">Telepon</label>
                <input name="telepon" type="text" class="form-control" id="telepon" placeholder="telepon" value="{{old('telepon')}}">
                    @if($errors->has('telepon'))
                        <span class="help-block">{{$errors->first('telepon')}}</span>
                    @endif
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3">{{old('alamat')}}</textarea>
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
            var guru_id = $(this).attr('guru-id');
            swal({
                title: "Yakin Ingin Menghapus Data Ini?",
                text: "Data siswa dengan ID "+ guru_id +" akan dihapus!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/guru/"+guru_id+"/delete";
                }
            });
        });
    </script>
@endsection