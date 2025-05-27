<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'ID_USER';
    public $timestamps = false;

    protected $fillable = [
       'ID_USER',
       'USERNAME',
       'PASSWORD',
       'ROLE',
       'NAMA_LENGKAP',
       'TOKEN'
    ];

}
