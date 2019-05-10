<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama','jam_bulan','semester','guru_id'];

    /**
     * Function untuk mendeklarasikan relasi many to many dengan tabel siswa
     */
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    } 
    
    //Function relation one to many dengan guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}