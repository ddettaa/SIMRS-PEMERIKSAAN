<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\api;
use App\Models\Poli;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/poli",
     *     summary="Ambil semua data poli",
     *     tags={"Poli"},
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil mengambil data"
     *     )
     * )
     */
    public function index(){
        // Logic to return poli data in JSON format
        $poli = Poli::all();
        return response()->json($poli);
    }

    /**
     * @OA\Post(
     *     path="/api/poli",
     *     summary="Simpan data poli",
     *     tags={"Poli"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_POLI", "NAMA_POLI"},
     *             @OA\Property(property="ID_POLI", type="string", example="P001"),
     *             @OA\Property(property="NAMA_POLI", type="string", example="Poli Umum")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Data berhasil disimpan"),
     *     @OA\Response(response=400, description="Data tidak valid")
     * )
     */
    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'ID_POLI' => 'required|string|max:20',
            'NAMA_POLI' => 'required|string|max:100'
        ]);

        try {
            // Create a new Poli instance and save it
            $poli = Poli::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan poli',
                'data' => $poli
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan poli: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/poli/{id}",
     *     summary="Ambil data poli berdasarkan ID",
     *     tags={"Poli"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Berhasil mengambil data"),
     *     @OA\Response(response=404, description="Poli tidak ditemukan")
     * )
     */

    public function show($id)
    {
        // Logic to return a specific poli by ID
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli not found'], 404);
        }
        return response()->json($poli);
    }
    /**
     * @OA\Put(
     *     path="/api/poli/{id}",
     *     summary="Update data poli",
     *     tags={"Poli"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_POLI", "NAMA_POLI"},
     *             @OA\Property(property="ID_POLI", type="string", example="P001"),
     *             @OA\Property(property="NAMA_POLI", type="string", example="Poli Umum")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data berhasil diupdate"),
     *     @OA\Response(response=404, description="Poli tidak ditemukan")
     * )
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'ID_POLI' => 'required|string|max:20',
            'NAMA_POLI' => 'required|string|max:100'
        ]);

        // Find the Poli by ID
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli not found'], 404);
        }

        try {
            // Update the Poli instance and save it
            $poli->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengupdate poli',
                'data' => $poli
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate poli: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * @OA\Delete(
     *     path="/api/poli/{id}",
     *     summary="Hapus data poli",
     *     tags={"Poli"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Data berhasil dihapus"),
     *     @OA\Response(response=404, description="Poli tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        // Find the Poli by ID
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli not found'], 404);
        }

        try {
            // Delete the Poli instance
            $poli->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus poli'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus poli: ' . $e->getMessage()
            ], 500);
        }
    }
}
