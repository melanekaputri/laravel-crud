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
                            <h3 class="panel-title">Data User</h3>
                            <div class="right">
                                {{-- <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export to Excel</a>
                                <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export to PDF</a> --}}
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="btn btn-sm btn-primary">Tambah Data User</i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ROLE</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>PASSWORD</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data_user as $user)
                                        <tr>
                                        {{-- <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_lengkap() }}</a></td> --}}
                                        {{-- <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td> --}}
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->password}}</td>
                                            <td>
                                                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" user-id="{{$user->id}}">Detele</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/user/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('role') ? 'has-error' : '' }}">
              <label for="role">Role</label>
            <input name="role" type="text" class="form-control" id="role" placeholder="Role" value="{{old('role')}}">
                @if($errors->has('role'))
                        <span class="help-block">{{$errors->first('role')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Password</label>
                <input name="password" type="text" class="form-control" id="password" placeholder="password" value="{{old('password')}}">
                    @if($errors->has('password'))
                        <span class="help-block">{{$errors->first('password')}}</span>
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
            var user_id = $(this).attr('user-id');
            swal({
                title: "Yakin Ingin Menghapus Data Ini?",
                text: "Data User dengan ID "+ user_id +" akan dihapus!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/user/"+user_id+"/delete";
                }
            });
        });
    </script>
@endsection