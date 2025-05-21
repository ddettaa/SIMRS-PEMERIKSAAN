<?php

namespace App\Http\Controllers\api\Dokter;
use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class PemeriksaanDokterController extends Controller
{
    public function index()
    {
        // Logic to display a list of pemeriksaan
        $pemeriksaan = Pemeriksaan::all();
        return response()->json($pemeriksaan);
    }

   public function store(Request $request)
{
    try {
        $data = $request->only([
            'ID_PEMERIKSAAN',
            'ID_DOKTER',
            'ID_PERAWAT',
            'ID_RESEP',
            'RM',
            'DIAGNOSA',
            'TINDAKAN',   
            'STATUS'      
        ]);

        $pemeriksaan = Pemeriksaan::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan pemeriksaan',
            'data' => $pemeriksaan
        ], 201);
    } catch (\Exception $e) {
        \Log::error('Error simpan pemeriksaan: ' . $e->getMessage());
        return response()->json([
            'status' => false,
            'message' => 'Terjadi kesalahan',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function show($id)
    {
        // Logic to display a specific pemeriksaan
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            return response()->json($pemeriksaan);
        } else {
            return response()->json(['message' => 'Pemeriksaan not found'], 404);
        }
        
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific pemeriksaan
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            $data = $request->only([
                'ID_PEMERIKSAAN',
                'ID_DOKTER',
                'ID_PERAWAT',
                'ID_RESEP',
                'RM',
                'DIAGNOSA',
                'TINDAKAN',   
                'STATUS'      
            ]);
            $pemeriksaan->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil memperbarui pemeriksaan',
                'data' => $pemeriksaan
            ]);
        } else {
            return response()->json(['message' => 'Pemeriksaan not found'], 404);
        }
    }

    public function destroy($id)
    {
        // Logic to delete a specific pemeriksaan
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            $pemeriksaan->delete();
            return response()->json(['message' => 'Pemeriksaan deleted successfully']);
        } else {
            return response()->json(['message' => 'Pemeriksaan not found'], 404);
        }
    }
}  

