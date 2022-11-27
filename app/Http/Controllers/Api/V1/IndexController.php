<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Version;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Version\V1\VersionResource;
use App\Http\Resources\Version\V1\VersionCollection;


class IndexController extends Controller
{
    /**
     * Get Version
     * @OA\Get (
     *     path="/api/v1/",
     *     tags={"Version", "V1"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *                 @OA\Property(
     *                 type="object",
     *                 property="data",
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         example="1.0"
     *                     ),
     *                     @OA\Property(
     *                         property="release_date",
     *                         type="string",
     *                         example="01.01.22"
     *                     ),
     *                 )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return new VersionResource(
            Cache::remember('version', 60 * 60 * 24, function () {
                return Version::orderByDesc('release_date')->first();
            })
        );
    }

    /**
     * Get Version
     * @OA\Get (
     *     path="/api/v1/all",
     *     tags={"Version", "V1"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *                 @OA\Property(
     *                 type="array",
     *                 property="data",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(
     *                             property="title",
     *                             type="string",
     *                             example="1.0"
     *                             ),
     *                         @OA\Property(
     *                             property="release_date",
     *                             type="string",
     *                             example="01.01.22"
     *                         ),
     *                         @OA\Property(
     *                             property="meta",
     *                             type="number",
     *                             example="1"
     *                         )
     *                      )
     *                 )
     *         )
     *     )
     * )
     */
    public function all()
    {
        return new VersionCollection(Version::all());
    }
}
