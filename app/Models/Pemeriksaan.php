<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'ID_PEMERIKSAAN';
    public $timestamps = false;

    protected $fillable = [
        'ID_DOKTER',
        'ID_PERAWAT',
        'RM',
        'SUHU',
        'TENSI',
        'TINGGI_BADAN',
        'BERAT_BADAN',
        'DIAGNOSA',
        'TINDAKAN',
        'STATUS'
    ];
}
