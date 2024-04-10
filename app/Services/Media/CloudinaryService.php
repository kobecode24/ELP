<?php

namespace App\Services\Media;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;


class CloudinaryService
{
    protected $cloudinary;

    public function __construct()
    {
        $config = Configuration::instance([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET')
            ]
        ]);

        $this->cloudinary = new Cloudinary($config);
    }

    public function getVideoDuration($publicId)
    {
        try {
            $result = $this->cloudinary->adminApi()->asset($publicId, ['resource_type' => 'video' ,"image_metadata"=>true]);
            \Log::info('Cloudinary API response: ', (array)$result);
            return $result['duration'] ?? 0;
        } catch (\Exception $e) {
            \Log::error('Failed to retrieve video duration from Cloudinary: ' . $e->getMessage());
            return 0;
        }
    }

}

