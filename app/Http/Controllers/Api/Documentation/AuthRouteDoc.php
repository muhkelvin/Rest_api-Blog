<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/login",
 *     tags={"Authentication"},
 *     summary="Login pengguna",
 *     description="Endpoint untuk login pengguna dan mendapatkan token autentikasi",
 *     operationId="login",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login berhasil",
 *         @OA\JsonContent(
 *             @OA\Property(property="user", ref="#/components/schemas/User"),
 *             @OA\Property(property="token", type="string", example="6|PHMg7Y4fviOdT9lyOH8moKz6F5jIvYv1Wuvy9I0j")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Kredensial tidak valid",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The provided credentials are incorrect.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validasi gagal",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/register",
 *     tags={"Authentication"},
 *     summary="Registrasi pengguna baru",
 *     description="Endpoint untuk mendaftarkan pengguna baru",
 *     operationId="register",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "password", "password_confirmation"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password123"),
 *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Registrasi berhasil",
 *         @OA\JsonContent(
 *             @OA\Property(property="user", ref="#/components/schemas/User"),
 *             @OA\Property(property="token", type="string", example="6|PHMg7Y4fviOdT9lyOH8moKz6F5jIvYv1Wuvy9I0j")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validasi gagal",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     )
 * )
 */
class AuthRouteDoc extends Controller
{
    // Class ini hanya untuk dokumentasi, tidak perlu methods
}
