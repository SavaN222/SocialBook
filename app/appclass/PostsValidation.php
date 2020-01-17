<?php 

namespace App\appclass;

class PostsValidation
{
    /**
     * Sanitize description for comment and post
     * @return type
     */
   public static function sanitizeDescription()
   {
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
            $description = htmlspecialchars(strip_tags($description));
        }
        return $description;
   }
}