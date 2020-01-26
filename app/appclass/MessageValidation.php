<?php 

namespace App\appclass;

class MessageValidation
{
  /**
   * Sanitize text for chat messenger
   * @return string
   */
   public static function sanitizeText(): string
   {
        if (isset($_POST['text'])) {
            $text = trim($_POST['text']);
            $text = htmlspecialchars(strip_tags($text));
        }
        return $text;
   }
}