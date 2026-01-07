<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected static function client()
    {
        return new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
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
