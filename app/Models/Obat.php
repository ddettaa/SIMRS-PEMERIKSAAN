<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'ID_RESEP';
    public $timestamps = false;

    protected $fillable = [
        'ID_RESEP',
        'ID_OBAT',
        'JUMLAH',
        'ATURAN_PAKAI'
    ];
}
