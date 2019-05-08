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
                            <h3 class="panel-title">Data Mata Pelajaran</h3>
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
                                        <th>KODE</th>
                                        <th>NAMA MATA PELAJARAN</th>
                                        <th>JAM/BULAN</th>
                                        <th>SEMESTER</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data_mapel as $mapel)
                                        <tr>
                                            <td>{{ $mapel->kode}}</td>
                                            <td>{{ $mapel->nama }}</td>
                                            <td>{{ $mapel->jam_bulan }}</td>
                                            <td>{{ $mapel->semester }}</td>
                                            <td>
                                                <a href="/mapel/{{ $mapel->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" mapel-id="{{$mapel->id}}">Detele</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/mapel/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('kode') ? 'has-error' : '' }}">
              <label for="kode">KODE</label>
            <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode Mata Pelajaran" value="{{old('kode')}}">
                @if($errors->has('kode'))
                        <span class="help-block">{{$errors->first('kode')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">NAMA MATA PELAJARAN</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Mata Pelajaran" value="{{old('nama')}}">
                    @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('jam_bulan') ? 'has-error' : '' }}">
                <label for="jam_bulan">JAM/BULAN</label>
                <input name="jam_bulan" type="text" class="form-control" id="jam_bulan" placeholder="Jam Belajar/bulan" value="{{old('jam_bulan')}}">
                    @if($errors->has('jam_bulan'))
                        <span class="help-block">{{$errors->first('jam_bulan')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('semester') ? 'has-error' : '' }}">
                <label for="semester">SEMESTER</label>
                <input name="semester" type="text" class="form-control" id="semester" placeholder="Semester" value="{{old('semester')}}">
                    @if($errors->has('semester'))
                        <span class="help-block">{{$errors->first('semester')}}</span>
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
            var mapel_id = $(this).attr('mapel-id');
            swal({
                title: "Yakin Ingin Menghapus Data Ini?",
                text: "Data Mata Pelajaran dengan ID "+ mapel_id +" akan dihapus!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/mapel/"+mapel_id+"/delete";
                }
            });
        });
    </script>
@endsection