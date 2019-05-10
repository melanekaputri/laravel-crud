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
                                    <h3 class="panel-title">Inputs</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/mapel/{{$mapel->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="kode">KODE</label>
                                    <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode Mata Pelajaran" value="{{$mapel->kode}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="nama">NAMA MATA PELAJARAN</label>
                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Mata Pelajaran" value="{{$mapel->nama}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="semester">SEMESTER</label>
                                    <input name="semester" type="text" class="form-control" id="semester" placeholder="Semester" value="{{$mapel->semester}}">
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

