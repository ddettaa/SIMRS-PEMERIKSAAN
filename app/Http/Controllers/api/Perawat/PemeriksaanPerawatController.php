<?php

namespace App\Http\Controllers\api\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanPerawatController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/perawat/pemeriksaan",
     *     summary="Ambil semua data pemeriksaan",
     *     tags={"Pemeriksaan Awal"},
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil mengambil data"
     *     )
     * )
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan::all();
        return response()->json($pemeriksaan);
    }

    /**
     * @OA\Post(
     *     path="/api/perawat/pemeriksaan",
     *     summary="Tambah pemeriksaan awal",
     *     tags={"Pemeriksaan Awal"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_PEMERIKSAAN","ID_DOKTER","ID_PERAWAT","ID_RESEP","RM","STATUS"},
     *             @OA\Property(property="ID_PEMERIKSAAN", type="string", example="P001"),
     *             @OA\Property(property="ID_DOKTER", type="string", example="D001"),
     *             @OA\Property(property="ID_PERAWAT", type="string", example="P001"),
     *             @OA\Property(property="ID_RESEP", type="string", example="R001"),
     *             @OA\Property(property="RM", type="string", example="RM001"),
     *             @OA\Property(property="SUHU", type="string", example="36"),
     *             @OA\Property(property="TENSI", type="string", example="120/80"),
     *             @OA\Property(property="TINGGI_BADAN", type="string", example="176"),
     *             @OA\Property(property="BERAT_BADAN", type="string", example="70"),
     *             @OA\Property(property="STATUS", type="string", example="Selesai")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Data Terkirim"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Data tidak valid"
     *     )
     * )
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'ID_PEMERIKSAAN',
                'ID_DOKTER',
                'ID_PERAWAT',
                'ID_RESEP',
                'RM',
                'SUHU',
                'TENSI',
                'TINGGI_BADAN',
                'BERAT_BADAN',
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

    /**
     * @OA\Get(
     *     path="/api/perawat/pemeriksaan/{id}",
     *     summary="Ambil data pemeriksaan berdasarkan ID",
     *     tags={"Pemeriksaan Awal"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID Pemeriksaan",
     *         @OA\Schema(type="string", example="P001")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data ditemukan"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Data tidak ditemukan"
     *     )
     * )
     */
    public function show($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            return response()->json($pemeriksaan);
        } else {
            return response()->json(['message' => 'Pemeriksaan not found'], 404);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/perawat/pemeriksaan/{id}",
     *     summary="Update data pemeriksaan Awal",
     *     tags={"Pemeriksaan Awal"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID Pemeriksaan",
     *         @OA\Schema(type="string", example="P001")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="ID_PERAWAT", type="string", example="D002"),
     *             @OA\Property(property="SUHU", type="string", example="45"),
     *             @OA\Property(property="TENSI", type="string", example="70/120"),
     *             @OA\Property(property="BERAT_BADAN", type="string", example="70"),
     *             @OA\Property(property="TINGGI_BADAN", type="string", example="176"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data berhasil diperbarui"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Permintaan tidak valid"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Data tidak ditemukan"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            $data = $request->only([
                'ID_PEMERIKSAAN',
                'ID_DOKTER',
                'ID_PERAWAT',
                'ID_RESEP',
                'RM',
                'SUHU',
                'TENSI',
                'TINGGI_BADAN',
                'BERAT_BADAN',
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

    /**
     * @OA\Delete(
     *     path="/api/perawat/pemeriksaan/{id}",
     *     summary="Hapus data pemeriksaan berdasarkan ID",
     *     tags={"Pemeriksaan Awal"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID Pemeriksaan",
     *         @OA\Schema(type="string", example="P001")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data berhasil dihapus"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Data tidak ditemukan"
     *     )
     * )
     */
    public function destroy($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            $pemeriksaan->delete();
            return response()->json(['message' => 'Pemeriksaan deleted successfully']);
        } else {
            return response()->json(['message' => 'Pemeriksaan not found'], 404);
        }
    }
}
