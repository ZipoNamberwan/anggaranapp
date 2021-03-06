<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    public $table = 'komponen';
    public $guarded = [];
    // public $primaryKey = 'kode';
    // protected $keyType = 'string';
    // public $incrementing = false;
    //

    public function subkomponen()
    {
        return $this->hasMany(Subkomponen::class, 'komponen_id');
    }

    public function ro()
    {
        return $this->belongsTo(Ro::class, 'ro_id');
    }

    public function children()
    {
        return $this->hasMany(Komponen::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Komponen::class);
    }
}
