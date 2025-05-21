<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class E_Resep extends Model
{
    
    protected $table = 'e-resep';
    protected $primaryKey = 'NO_RESEP';
    public $timestamps = false;

    protected $fillable = [
        'ID_RESEP',
        'ID_OBAT',
        'JUMLAH',
        'ATURAN_PAKAI'
    ];
}
