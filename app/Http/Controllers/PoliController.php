<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function json(){
        // Logic to return poli data in JSON format
        $poli = Poli::all();
        return response()->json($poli);
    }
}
