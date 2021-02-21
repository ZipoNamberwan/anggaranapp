<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ro extends Model
{
    use HasFactory;
    public $table = 'ro';

    public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function komponen()
    {
        return $this->hasMany(Komponen::class, 'ro_id');
    }

    public function kro()
    {
        return $this->belongsTo(Kro::class, 'kro_id');
    }
}
