<?php 

namespace App\appclass;

class PostsValidation
{
   public static function sanitizePost()
   {
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
            $description = htmlspecialchars(strip_tags($description));
        }
        return $description;
   }
}