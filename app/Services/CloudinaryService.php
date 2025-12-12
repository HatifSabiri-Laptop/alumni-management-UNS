<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected static function client()
    {
        return new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
    }

    public static function upload($filePath, $folder = 'uploads')
    {
        try {
            $cloudinary = self::client();

            $result = $cloudinary->uploadApi()->upload($filePath, [
                'folder' => $folder,
            ]);

            return $result['secure_url'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
