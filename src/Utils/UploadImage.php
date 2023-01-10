<?php

namespace App\Utils;

class UploadImage
{
    public static function upload(array $image): ?string
    {
        if (isset($image)) {
            $imageName = $image["name"];
            $imageTmp = $image["tmp_name"];

            $fileType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowedtype = array("jpg", "jpeg", "png", "webp");

            if (in_array($fileType, $allowedtype)) {
                $name = uniqid("img-", true) . "." . $fileType;
                $targetDir = __DIR__ . "/../../public/content/images/";
                $file = $targetDir .  $name;
                move_uploaded_file($imageTmp, $file);

                return "/$name";
            }

            return null;
        }

        return null;
    }
}
