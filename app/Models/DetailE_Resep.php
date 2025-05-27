<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DetailE_Resep extends Model
{
    use HasFactory;
    protected $table = 'detail_e_resep';
    protected $primaryKey = 'ID_RESEP';
    public $timestamps = false;

    protected $fillable = [
        'ID_RESEP',
        'ID_OBAT',
        'JUMLAH',
        'ATURAN_PAKAI'
    ];
}
