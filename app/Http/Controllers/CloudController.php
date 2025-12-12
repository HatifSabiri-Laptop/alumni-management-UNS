<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use App\Services\CloudinaryService;

class CloudController extends Controller
{
    /**
     * Upload using CloudinaryService (recommended)
     */
    public function testUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $filePath = $request->file('image')->getRealPath();

        $url = CloudinaryService::upload($filePath);

        return $url ?? "Upload failed";
    }

    /**
     * Upload directly using Cloudinary SDK
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        // 🔥 DEBUG STEP 1 — Check if ENV values are being loaded
        dd([
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
            'api_key'    => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET'),
        ]);

        // (STOP — don’t run the rest yet)


        // Initialize Cloudinary correctly


        $filePath = $request->file('image')->getRealPath();

        // Upload
        $result = $cloudinary->uploadApi()->upload($filePath, [
            'folder' => 'uploads'
        ]);

        return $result['secure_url'];
    }
}
