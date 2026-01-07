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

        // Initialize Cloudinary correctly
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ]
        ]);

        $filePath = $request->file('image')->getRealPath();

        // Upload
        $result = $cloudinary->uploadApi()->upload($filePath, [
            'folder' => 'uploads'
        ]);

        return view('upload_success', ['url' => $result['secure_url']]);
    }
}
