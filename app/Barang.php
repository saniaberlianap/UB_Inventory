<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ruangan;

class Barang extends Model
{
    public $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'ruangan_id',
        'image', 
        'nama_barang', 
        'total', 
        'broken', 
        'created_by', 
        'updated_by'
    ];

    public function ruangan(){
    	return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id_ruangan');
    }

    public function user_create(){
    	return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function user_update(){
    	return $this->belongsTo('App\User', 'updated_by', 'id');
    }

}
