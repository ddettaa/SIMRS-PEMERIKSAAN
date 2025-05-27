<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
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
