<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

    /**
     * Function untuk data yang belum upload gambar
     */
    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/' .$this->avatar);
    }

    /**
     * Function untuk mendeklarasikan relasi many to many dengan tabel mapel
     */
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();
    }

    //Custom function untuk rata-rata nilai
    public function rataNilai()
    {
        //Ambil Data Nilai
        $total = 0;
        $count = 0;
        foreach($this->mapel as $mapel){
            $total = $total + $mapel->pivot->nilai;
            $count++;
        }

        return round($total/$count,2);
    }

    //Custom function untuk nama lengkap
    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}