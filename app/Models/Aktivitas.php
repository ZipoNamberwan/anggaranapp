<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;
    public $table = 'aktivitas';

    public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function kro()
    {
        return $this->hasMany(Kro::class, 'aktivitas_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
