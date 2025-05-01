<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/categories",
 *     tags={"Categories"},
 *     summary="Mendapatkan daftar semua kategori",
 *     description="Menampilkan semua kategori",
 *     operationId="indexCategories",
 *     @OA\Response(
 *         response=200,
 *         description="Daftar kategori berhasil diambil",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Category")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/categories/{category}",
 *     tags={"Categories"},
 *     summary="Mendapatkan detail kategori",
 *     description="Mendapatkan informasi detail untuk kategori tertentu berdasarkan ID",
 *     operationId="showCategory",
 *     @OA\Parameter(
 *         name="category",
 *         in="path",
 *         description="ID kategori yang akan ditampilkan",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detail kategori berhasil diambil",
 *         @OA\JsonContent(ref="#/components/schemas/CategoryWithRelations")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Kategori tidak ditemukan",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/categories",
 *     tags={"Categories"},
 *     summary="Membuat kategori baru",
 *     description="Membuat kategori baru (memerlukan autentikasi)",
 *     operationId="storeCategory",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name"},
 *             @OA\Property(property="name", type="string", example="New Category"),
 *             @OA\Property(property="description", type="string", example="Description of the new category")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Kategori berhasil dibuat",
 *         @OA\JsonContent(ref="#/components/schemas/Category")
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
 *     path="/api/categories/{category}",
 *     tags={"Categories"},
 *     summary="Memperbarui kategori",
 *     description="Memperbarui kategori yang sudah ada (memerlukan autentikasi)",
 *     operationId="updateCategory",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="category",
 *         in="path",
 *         description="ID kategori yang akan diperbarui",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Updated Category Name"),
 *             @OA\Property(property="description", type="string", example="Updated description of the category")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Kategori berhasil diperbarui",
 *         @OA\JsonContent(ref="#/components/schemas/Category")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Tidak terautentikasi",
 *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedError")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Kategori tidak ditemukan",
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
 *     path="/api/categories/{category}",
 *     tags={"Categories"},
 *     summary="Menghapus kategori",
 *     description="Menghapus kategori (memerlukan autentikasi)",
 *     operationId="destroyCategory",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="category",
 *         in="path",
 *         description="ID kategori yang akan dihapus",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Kategori berhasil dihapus",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Category deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Tidak terautentikasi",
 *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedError")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Kategori tidak ditemukan",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Kategori tidak dapat dihapus karena masih memiliki post",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Cannot delete category because it has associated posts")
 *         )
 *     )
 * )
 */
class CategoryRouteDoc extends Controller
{
    // Class ini hanya untuk dokumentasi, tidak perlu methods
}
