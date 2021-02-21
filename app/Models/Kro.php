<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kro extends Model
{
    use HasFactory;
    public $table = 'kro';

    public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function ro()
    {
        return $this->hasMany(Ro::class, 'kro_id');
    }

    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class, 'aktivitas_id');
    }
}
