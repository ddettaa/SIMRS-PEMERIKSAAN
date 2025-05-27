<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $primaryKey = 'ID_JADWAL';
    public $timestamps = false;

    protected $fillable = [
        'ID_JADWAL',
        'ID_DOKTER',
        'ID_PERAWAT',
        'HARI',
        'JAM_MULAI',
        'JAM_AKHIR'
    ];
}
