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
                                    <h3 class="panel-title">Edit Data User</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/user/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                      <input name="role" type="text" class="form-control" id="role" placeholder="Role" value="{{$user->role}}">
                                      </div>
                                    <div class="form-group">
                                      <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
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