<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Poli;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function json(){
        // Logic to return poli data in JSON format
        $poli = Poli::all();
        return response()->json($poli);
    }
}
