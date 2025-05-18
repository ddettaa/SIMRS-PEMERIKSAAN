<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index ()
    {
        // Logic to return pemeriksaan data in JSON format
        $obat = Obat::all();
        return response()->json($obat);
    }
}
