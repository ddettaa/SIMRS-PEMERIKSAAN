<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // Logic to return jadwal data in JSON format
        $jadwal = Jadwal::all();
        return response()->json($jadwal);
    }
}
