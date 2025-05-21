<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
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
