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
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
}