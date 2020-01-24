<?php

namespace App\appclass;
/**
 * LoginValidation return clean input data
 */
class LoginValidation
{
    /**
     * Sanitize input data for login
     * @return array $data
     */
    public static function sanitizeData(): array
    {
        if (isset($_POST['submit'])) {
            // First clear space
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            // Sanitize data
            $email = htmlspecialchars(strip_tags($email));
            $password = htmlspecialchars(strip_tags($password));

            $data = [
                'email' => $email, 
                'password' => $password 
            ];
        }
        return $data;
    }
}