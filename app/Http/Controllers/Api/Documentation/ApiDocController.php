<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API Documentation",
 *     description="Dokumentasi API untuk aplikasi Blog dengan Laravel",
 *     @OA\Contact(
 *         email="admin@example.com",
 *         name="Admin API"
 *     )
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Tag(
 *     name="Authentication",
 *     description="API Endpoints untuk autentikasi"
 * )
 *
 * @OA\Tag(
 *     name="Posts",
 *     description="API Endpoints untuk operasi pada posts"
 * )
 *
 * @OA\Tag(
 *     name="Categories",
 *     description="API Endpoints untuk operasi pada categories"
 * )
 *
 * @OA\Schema(
 *     schema="User",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="Category",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Technology"),
 *     @OA\Property(property="description", type="string", example="Posts about technology"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="Post",
 *     required={"title", "content", "category_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Judul Post"),
 *     @OA\Property(property="content", type="string", example="Konten post lengkap ada di sini..."),
 *     @OA\Property(property="category_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="PostWithRelations",
 *     allOf={
 *         @OA\Schema(ref="#/components/schemas/Post"),
 *         @OA\Schema(
 *             @OA\Property(
 *                 property="category",
 *                 ref="#/components/schemas/Category"
 *             ),
 *             @OA\Property(
 *                 property="user",
 *                 ref="#/components/schemas/User"
 *             )
 *         )
 *     }
 * )
 *
 * @OA\Schema(
 *     schema="CategoryWithRelations",
 *     allOf={
 *         @OA\Schema(ref="#/components/schemas/Category"),
 *         @OA\Schema(
 *             @OA\Property(
 *                 property="posts",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Post")
 *             )
 *         )
 *     }
 * )
 *
 * @OA\Schema(
 *     schema="ValidationError",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="The given data was invalid."
 *     ),
 *     @OA\Property(
 *         property="errors",
 *         type="object",
 *         example={"title": {"The title field is required."}, "content": {"The content field is required."}}
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="NotFoundError",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Resource not found."
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="UnauthorizedError",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Unauthenticated."
 *     )
 * )
 */
class ApiDocController extends Controller
{
    // Kontroller ini hanya untuk dokumentasi, tidak perlu methods
}
