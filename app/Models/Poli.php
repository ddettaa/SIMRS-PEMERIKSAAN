<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    protected $primaryKey = 'ID_POLI';
    public $timestamps = false;

    protected $fillable = [
        'ID_POLI',
        'ID_DOKTER',
        'ID_DOKTER',
        'NAMA_POLI',
    ];
}
