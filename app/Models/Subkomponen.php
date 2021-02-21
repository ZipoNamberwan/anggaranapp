<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkomponen extends Model
{
    use HasFactory;
    public $table = 'subkomponen';
	
	public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;
    
    public function detil(){
        return $this->hasMany(Detil::class, 'subkomponen_id');
    }

    public function komponen(){
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }
}
