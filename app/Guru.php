<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillabel = ['nama','telepon','alamat'];

    //Function relatio to mapel
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
