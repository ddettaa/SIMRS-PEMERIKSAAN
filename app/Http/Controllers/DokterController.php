<?php

namespace App\Http\Controllers;
use App\Models\Dokter;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        // Logic to return dokter data in JSON format
        $dokter = Dokter::all();
        return response()->json($dokter);
    }
}
