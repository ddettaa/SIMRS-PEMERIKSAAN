<?php

namespace App\Http\Controllers\api\Dokter;

use App\Http\Controllers\Controller;
use App\Models\E_Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EresepController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/dokter/eresep",
     *     summary="Ambil semua data eresep",
     *     tags={"Eresep"},
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil mengambil data"
     *     )
     * )
     */
    public function index()
    {
        $eresep = E_Resep::all();
        return response()->json($eresep);
    }

    /**
     * @OA\Post(
     *     path="/api/dokter/eresep",
     *     summary="Simpan data eresep",
     *     tags={"Eresep"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_RESEP", "ID_PEMERIKSAAN"},
     *             @OA\Property(property="ID_RESEP", type="string", example="R001"),
     *             @OA\Property(property="ID_PEMERIKSAAN", type="string", example="P001")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Data berhasil disimpan"),
     *     @OA\Response(response=400, description="Data tidak valid")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_RESEP' => 'required|string|max:20',
            'ID_PEMERIKSAAN' => 'required|string|max:20'
        ]);

        try {
            $data = $request->only(['ID_RESEP', 'ID_PEMERIKSAAN']);

            $eresep = E_Resep::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan eresep',
                'data' => $eresep
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error simpan eresep: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/dokter/eresep/{id}",
     *     summary="Ambil data eresep berdasarkan ID",
     *     tags={"Eresep"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Berhasil mengambil data"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $eresep = E_Resep::find($id);

        if ($eresep) {
            return response()->json($eresep);
        }

        return response()->json(['message' => 'Eresep tidak ditemukan'], 404);
    }

    /**
     * @OA\Put(
     *     path="/api/dokter/eresep/{id}",
     *     summary="Update data eresep",
     *     tags={"Eresep"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_RESEP", "ID_PEMERIKSAAN"},
     *             @OA\Property(property="ID_RESEP", type="string", example="R001"),
     *             @OA\Property(property="ID_PEMERIKSAAN", type="string", example="P001")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data berhasil diupdate"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_RESEP' => 'required|string|max:20',
            'ID_PEMERIKSAAN' => 'required|string|max:20'
        ]);

        $eresep = E_Resep::find($id);

        if (!$eresep) {
            return response()->json(['message' => 'Eresep tidak ditemukan'], 404);
        }

        $eresep->update($request->only(['ID_RESEP', 'ID_PEMERIKSAAN']));

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengupdate eresep',
            'data' => $eresep
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/dokter/eresep/{id}",
     *     summary="Hapus data eresep",
     *     tags={"Eresep"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Data berhasil dihapus"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        $eresep = E_Resep::find($id);

        if (!$eresep) {
            return response()->json(['message' => 'Eresep tidak ditemukan'], 404);
        }

        $eresep->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menghapus eresep'
        ]);
    }
}
