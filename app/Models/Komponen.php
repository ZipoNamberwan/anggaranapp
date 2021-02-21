<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    public $table = 'komponen';

    public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function subkomponen()
    {
        return $this->hasMany(Subkomponen::class, 'komponen_id');
    }

    public function ro()
    {
        return $this->belongsTo(Ro::class, 'ro_id');
    }
}
