<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Version;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Version\V2\VersionResource;
use App\Http\Resources\Version\V2\VersionCollection;


class IndexController extends Controller
{
    public function index()
    {
        return new VersionResource(
            Cache::remember('version', 60 * 60 * 24, function () {
                return Version::orderByDesc('release_date')->first();
            })
        );
    }

    public function all()
    {
        return new VersionCollection(Version::all());
    }
}
