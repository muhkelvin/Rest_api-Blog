<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/posts",
 *     tags={"Posts"},
 *     summary="Mendapatkan daftar semua post",
 *     description="Menampilkan semua post dengan pagination",
 *     operationId="indexPosts",
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Nomor halaman pagination",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Jumlah item per halaman",
 *         required=false,
 *         @OA\Schema(type="integer", default=15)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Daftar post berhasil diambil",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Post")),
 *             @OA\Property(property="links", type="object"),
 *             @OA\Property(property="meta", type="object")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/posts/{post}",
 *     tags={"Posts"},
 *     summary="Mendapatkan detail post",
 *     description="Mendapatkan informasi detail untuk post tertentu berdasarkan ID",
 *     operationId="showPost",
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="ID post yang akan ditampilkan",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detail post berhasil diambil",
 *         @OA\JsonContent(ref="#/components/schemas/PostWithRelations")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post tidak ditemukan",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/posts",
 *     tags={"Posts"},
 *     summary="Membuat post baru",
 *     description="Membuat post baru (memerlukan autentikasi)",
 *     operationId="storePost",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title", "content", "category_id"},
 *             @OA\Property(property="title", type="string", example="Judul Post Baru"),
 *             @OA\Property(property="content", type="string", example="Konten post baru yang lengkap..."),
 *             @OA\Property(property="category_id", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Post berhasil dibuat",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Tidak terautentikasi",
 *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedError")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validasi gagal",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/api/posts/{post}",
 *     tags={"Posts"},
 *     summary="Memperbarui post",
 *     description="Memperbarui post yang sudah ada (memerlukan autentikasi)",
 *     operationId="updatePost",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="ID post yang akan diperbarui",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string", example="Judul Post yang Diperbarui"),
 *             @OA\Property(property="content", type="string", example="Konten post yang diperbarui..."),
 *             @OA\Property(property="category_id", type="integer", example=2)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post berhasil diperbarui",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Tidak terautentikasi",
 *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedError")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Tidak diizinkan mengakses resource ini",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This action is unauthorized.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post tidak ditemukan",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validasi gagal",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/posts/{post}",
 *     tags={"Posts"},
 *     summary="Menghapus post",
 *     description="Menghapus post (memerlukan autentikasi)",
 *     operationId="destroyPost",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="ID post yang akan dihapus",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post berhasil dihapus",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Post deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Tidak terautentikasi",
 *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedError")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Tidak diizinkan mengakses resource ini",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This action is unauthorized.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post tidak ditemukan",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     )
 * )
 */
class PostRouteDoc extends Controller
{
    // Class ini hanya untuk dokumentasi, tidak perlu methods
}
