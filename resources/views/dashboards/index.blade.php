@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ranking Siswa 5 Besar</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped"> 
                                    <thead>
                                        <tr>
                                            <th>RANKING</th>
                                            <th>NAMA</th>
                                            <th>NILAI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $ranking = 1;
                                        @endphp
                                        @foreach(ranking5Besar() as $s)
                                        <tr>
                                            <td>{{$ranking}}</td>
                                            <td>{{$s->nama_lengkap()}}</td>
                                            <td>{{$s->rataRataNilai}}</td>
                                        </tr>
                                        @php
                                            $ranking++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="lnr lnr-user"></i></span>
                            <p>
                                <span class="title">Jumlah Siswa</span>
                                <span class="number">{{totalSiswa()}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <p>
                                <span class="title">Jumlah Guru</span>
                                <span class="number">{{totalGuru()}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="lnr lnr-users"></i></span>
                            <p>
                                <span class="title">Jumlah User</span>
                                <span class="number">{{totalUser()}}</span>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</div>                
@endsection