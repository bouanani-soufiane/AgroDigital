<?php

namespace App\Services\Implementation;

use App\Services\contract\UploadImageInterface;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class UploadToCloudinaryService implements UploadImageInterface
{
    public function upload($image): string
    {
        $publicId = Str::random(8) . "_" . $image->getClientOriginalName();

        return Cloudinary::upload(
            $image->getRealPath(),
            [
                "public_id" => $publicId,
                "folder" => "AgroDigital"
            ]
        )->getSecurePath();
    }
}
