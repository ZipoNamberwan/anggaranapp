<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detil extends Model
{
    use HasFactory;
    public $table = 'detil';
    public $guarded = [];

    public function subkomponen(){
        return $this->belongsTo(Subkomponen::class, 'subkomponen_id');
    }

    public function jenisbelanja(){
        return $this->belongsTo(JenisBelanja::class, 'jenis_belanja_id');
    }

    public function fungsi(){
        return $this->belongsTo(Fungsi::class, 'fungsi_id');
    }
    
}
