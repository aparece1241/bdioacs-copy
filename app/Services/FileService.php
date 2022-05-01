<?php

namespace App\Services;

class FileService
{
    public static function getBaseImageUrl($image)
    {
        return 'data:image/'
            . pathinfo($image, PATHINFO_EXTENSION)
            . ';base64,'
            . base64_encode(file_get_contents($image));
    }
}
