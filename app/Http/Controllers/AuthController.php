<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login user",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"username","password"},
 *             @OA\Property(property="username", type="string", example="dokter01"),
 *             @OA\Property(property="password", type="string", format="password", example="rahasia123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Username or password is incorrect",
 *     ),
 *    @OA\Response(
 *        response=403,
 *        description="Role not recognized",
 *      )
 * )
 */
    public function login (Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = Users::where('USERNAME', $request->username)->first();


       if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'username atau password salah.'
            ], 401);
        }
        if (!in_array($user->role, ['dokter', 'perawat'])) {
            return response()->json([
                'message' => 'Role tidak dikenali.'
            ], 403);
        }
    }

    public function logout(Request $request)
    {

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout berhasil.'
        ]);
    }

}
