<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected  $table = 'jurusan';

    protected $fillable = ['nama_jurusan', 'fakultas_id'];

    public function fakultas(){
    	return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id_fakultas');
    }

     public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class, 'jurusan_id', 'id');
    }


}
