<?php
use App\Siswa;
use App\Guru;

function ranking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function($s){               
        $s->rataRataNilai = $s->rataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);   //untuk mengambil ranking 5 besar

    // $siswa = $siswa->sortByDesc('rataRataNilai');

    return $siswa;

}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}