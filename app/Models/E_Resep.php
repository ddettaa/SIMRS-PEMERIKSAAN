<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class E_Resep extends Model
{
    use HasFactory;
    protected $table = 'e-resep';
    protected $primaryKey = 'ID_RESEP';
    public $timestamps = false;

    protected $fillable = [
        'ID_RESEP',
        'ID_PEMERIKSAAN'
    ];
}
