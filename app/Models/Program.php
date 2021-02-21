<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $table = 'program';

    public $primaryKey = 'kode';
    public $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'program_id');
    }
}
