<?php 

namespace App\appclass;

class ImagesValidation
{
    /**
     * Check if image jpg or png and give image unique name
     * @param array $_FILES['profilePic'] $img 
     * @return string filePath
     */
    public static function uploadProfilePic(array $img): string
    {
        $filePath = '';

        $allowedExtension = ['jpg','png'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/pjpeg'];

        $imageNameArray = explode('.', $img['name']);
        $imageExtension = end($imageNameArray);

        $imageName = $imageNameArray[0] . round(microtime(true)).'.'.$imageExtension;

        if (in_array($imageExtension, $allowedExtension) && 
            in_array($img['type'], $allowedTypes)) {
            $filePath = 'images/profile/' . $imageName;
            move_uploaded_file($img['tmp_name'], $filePath);
            if (isset($_SESSION['profilePic'])) {
                $deleteOldPic = $_SESSION['profilePic'];
                unlink($deleteOldPic);
            }
        } else {
            $filePath = $_SESSION['profilePic'];
        }

        return $filePath;
    }

    /**
     * Check if image jpg or png and give image unique name
     * @param array $_FILES['profilePic'] $img 
     * @return string filePath
     */
    public static function uploadCoverPic(array $img): string
    {
        $filePath = '';

        $allowedExtension = ['jpg','png'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/pjpeg'];

        $imageNameArray = explode('.', $img['name']);
        $imageExtension = end($imageNameArray);

        $imageName = $imageNameArray[0] . round(microtime(true)).'.'.$imageExtension;

        if (in_array($imageExtension, $allowedExtension) && 
            in_array($img['type'], $allowedTypes)) {
            $filePath = 'images/cover/' . $imageName;
            move_uploaded_file($img['tmp_name'], $filePath);
            if (isset($_SESSION['coverPic'])) {
                $deleteOldPic = $_SESSION['coverPic'];
                unlink($deleteOldPic);
            }
        } else {
            $filePath = $_SESSION['coverPic'];
        }

        return $filePath;
    }
}