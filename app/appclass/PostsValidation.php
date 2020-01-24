<?php 

namespace App\appclass;

class PostsValidation
{
  /**
   * Sanitize description for comment and post
   * @return string
   */
   public static function sanitizeDescription(): string
   {
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
            $description = htmlspecialchars(strip_tags($description));
        }
        return $description;
   }
}