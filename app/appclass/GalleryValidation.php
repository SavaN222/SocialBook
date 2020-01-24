<?php 

namespace App\appclass;

class GalleryValidation
{
    /**
     * Sanitize and return description and picture for gallery
     * @return array data
     */
    public static function sanitizeData(): array
    {
        if (isset($_POST['submit'])) {
            $description = trim(htmlspecialchars(strip_tags($_POST['description'])));
            $photo = self::galleryPhoto($_FILES['photo']);

            $data = [
                'photo' => $photo,
                'description' => $description
            ];
        }
        return $data;
    }

     /**
     * Check if image jpg or png and give image unique name
     * @param $_FILES $img 
     * @return string filePath
     */
    public static function galleryPhoto($img): string
    {
        $filePath = '';

        $allowedExtension = ['jpg','png'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/pjpeg'];

        $imageNameArray = explode('.', $img['name']);
        $imageExtension = end($imageNameArray);

        $imageName = $imageNameArray[0] . round(microtime(true)) . '.' . $imageExtension;

        if (in_array($imageExtension, $allowedExtension) && 
            in_array($img['type'], $allowedTypes)) {
            $filePath = 'images/gallery/'.$_SESSION['fname'] . $_SESSION['lname'] . $imageName;
            move_uploaded_file($img['tmp_name'], $filePath);
        } else {
            $filePath = '';
        }

        return $filePath;
    }
}