@extends('layouts.master')

@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
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
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$guru->getAvatar()}}" class="img-circle" alt="Avatar">
                            <h3 class="name">{{$guru->nama}}</h3>
                                
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-12 stat-item">
                                        {{$guru->mapel->count()}} <span>Mata Pelajaran</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Detail Profil Diri</h4>
                                <ul class="list-unstyled list-justify">
                                <li>Jenis Kelamin <span>{{$guru->jenis_kelamin}}</span></li>
                                <li>Agama <span>{{$guru->agama}}</span></li>
                                <li>Alamat <span>{{$guru->alamat}}</span></li>
                                </ul>
                            </div>
                            
                        <div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                        </div>
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right"> 
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Mata Pelajaran
                            </button>
                        <div class="panel">
                            <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran yang Diajar oleh Guru {{$guru->nama}}</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>SEMESTER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru->mapel as $mapel)
                                           <tr>
                                           <td>{{$mapel->kode}}</td>
                                           <td>{{$mapel->nama}}</td>
                                           <td>{{$mapel->semester}}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/guru/{{$guru->id}}/addmapel" method="POST" enctype="multipart/form-data">
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

@endsection

@section('footer')
   
@endsection