<?php

namespace App\Http\Controllers\api\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PemeriksaanDokterController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/dokter/pemeriksaan",
     *     summary="Ambil semua data pemeriksaan",
     *     tags={"Pemeriksaan Dokter"},
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
     *     path="/api/dokter/pemeriksaan",
     *     summary="Simpan data pemeriksaan dokter",
     *     description="API untuk mengelola pemeriksaan dokter",
     *     tags={"Pemeriksaan Dokter"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ID_PEMERIKSAAN","ID_DOKTER","ID_PERAWAT","ID_RESEP","RM","DIAGNOSA","TINDAKAN","STATUS"},
     *             @OA\Property(property="ID_PEMERIKSAAN", type="string", example="P001"),
     *             @OA\Property(property="ID_DOKTER", type="string", example="D001"),
     *             @OA\Property(property="ID_PERAWAT", type="string", example="P001"),
     *             @OA\Property(property="ID_RESEP", type="string", example="R001"),
     *             @OA\Property(property="RM", type="string", example="RM001"),
     *             @OA\Property(property="DIAGNOSA", type="string", example="Flu"),
     *             @OA\Property(property="TINDAKAN", type="string", example="Pemeriksaan Umum"),
     *             @OA\Property(property="STATUS", type="string", example="Selesai")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Data berhasil disimpan"),
     *     @OA\Response(response=500, description="Kesalahan server")
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
            Log::error('Error simpan pemeriksaan: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/dokter/pemeriksaan/{id}",
     *     summary="Ambil data pemeriksaan berdasarkan ID",
     *     tags={"Pemeriksaan Dokter"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID Pemeriksaan",
     *         @OA\Schema(type="string", example="P001")
     *     ),
     *     @OA\Response(response=200, description="Data ditemukan"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            return response()->json($pemeriksaan);
        }
        return response()->json(['message' => 'Pemeriksaan tidak ditemukan'], 404);
    }

    /**
     * @OA\Put(
     *     path="/api/dokter/pemeriksaan/{id}",
     *     summary="Update data pemeriksaan dokter",
     *     tags={"Pemeriksaan Dokter"},
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
     *             required={"ID_DOKTER", "DIAGNOSA", "TINDAKAN", "STATUS"},
     *             @OA\Property(property="ID_DOKTER", type="string", example="D002"),
     *             @OA\Property(property="DIAGNOSA", type="string", example="Demam"),
     *             @OA\Property(property="TINDAKAN", type="string", example="Pemeriksaan lanjutan"),
     *             @OA\Property(property="STATUS", type="string", example="Dalam Proses")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data berhasil diperbarui"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
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
        }
        return response()->json(['message' => 'Pemeriksaan tidak ditemukan'], 404);
    }

    /**
     * @OA\Delete(
     *     path="/api/dokter/pemeriksaan/{id}",
     *     summary="Hapus data pemeriksaan berdasarkan ID",
     *     tags={"Pemeriksaan Dokter"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID Pemeriksaan",
     *         @OA\Schema(type="string", example="P001")
     *     ),
     *     @OA\Response(response=200, description="Data berhasil dihapus"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        if ($pemeriksaan) {
            $pemeriksaan->delete();
            return response()->json(['message' => 'Pemeriksaan berhasil dihapus']);
        }
        return response()->json(['message' => 'Pemeriksaan tidak ditemukan'], 404);
    }
}
