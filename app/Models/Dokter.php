<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use hasFactory;
    protected $table = 'dokter';
    protected $primaryKey = 'ID_DOKTER';
    public $timestamps = false;

    protected $fillable = [
        'ID_DOKTER',
        'ID_USER',
        'NAMA_DOKTER',
        'NO_HP_DOKTER',
        'EMAIL_DOKTER',
        'SPESIALIS'
    ];
}
