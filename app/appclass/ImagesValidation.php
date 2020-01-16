<?php 

namespace App\appclass;

class ImagesValidation
{
    /**
     * Check if image jpg or png and give image unique name
     * @param $_FILES $img 
     * @return string filePath
     */
    public static function uploadProfilePic($img)
    {
        $filePath = '';

        $allowedExtension = ['jpg','png'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/pjpeg'];

        $imageNameArray = explode('.', $img['name']);
        $imageExtension = end($imageNameArray);

        $imageName = $imageNameArray[0] . round(microtime(true)) . '.' . $imageExtension;

        if (in_array($imageExtension, $allowedExtension) && 
            in_array($img['type'], $allowedTypes)) {
            $filePath = 'images/profile/' . $imageName;
            move_uploaded_file($img['tmp_name'], $filePath);
        } else {
            $filePath = '';
        }

        return $filePath;
    }
}