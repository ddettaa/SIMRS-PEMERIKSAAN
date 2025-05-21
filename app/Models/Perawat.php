<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = 'perawat';
    protected $primaryKey = 'ID_PERAWAT';
    public $timestamps = false;

    protected $fillable = [
        'ID_PERAWAT',
        'ID_USER',
        'NAMA_PERAWAT',
        'NO_HP_PERAWAT',
        'EMAIL_PERAWAT'
    ];
}
