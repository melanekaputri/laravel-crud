<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    //FUNCTION HEADING
    public function headings(): array
    {
        return [
            'NAMA LENGKAP',
            'JENIS KELAMIN',
            'AGAMA',
            'ALAMAT',
            'RATA-RATA NILAI'
        ];
    }

    //FUNCTION MAPPING DATA (MEMODIFIKASI DATA YANG INGIN DITAMPILKAN)
    public function map($siswa): array
    {
        return [
           $siswa->nama_lengkap(),
           $siswa->jenis_kelamin,
           $siswa->agama,
           $siswa->alamat,
           $siswa->rataNilai()
        ];
    }
}
