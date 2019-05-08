<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nip','nama','jenis_kelamin','telepon','agama','alamat'];

    //Function relatio to mapel
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
