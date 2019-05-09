<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nip','nama','jenis_kelamin','telepon','agama','alamat','guru_id','avatar'];

    //Function relatio to mapel
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    //Function untuk upload gambar 
    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/' .$this->avatar);
    }
}
