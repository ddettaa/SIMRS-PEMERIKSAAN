<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
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
    
   public function dokter()
    {
        return $this->belongsTo(Users::class, 'id_dokter')->whereHas('poli',function($query){
            $query->where('id_poli', 'id_dokter');
        });
    }
    public function perawat()
    {
        return $this->belongsTo(Users::class, 'id_perawat')->whereHas('poli',function($query){
            $query->where('id_poli', 'id_perawat');
        });
    }

}
