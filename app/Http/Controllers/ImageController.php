<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(string $path)
    {
        $this->authorize('view-image');
        if (!Storage::exists("images/$path")) {
            abort(404);
        }

        return response()->file(storage_path("app/images/$path"));
    }
}
