<?php

namespace App\appclass;

/**
 * Class handle errors, validation and sanitize data
 */
class RegisterValidation
{   
    /**
     * Check if errors exsist
     * @return array $errors
     */
    public static function checkErrors(): array
    {
        $data = self::validateData();
        $errors = [];

        if (!empty($data['errorName'])) {
            $errors['errorName'] = $data['errorName'];
        }
        if (!empty($data['errorLastName'])) {
            $errors['errorLastName'] = $data['errorLastName'];
        }
        if (!empty($data['errorEmail'])) {
            $errors['errorEmail'] = $data['errorEmail'];
        }
        if (!empty($data['errorGender'])) {
            $errors['errorGender'] = $data['errorGender'];
        }
        if (!empty($data['errorPassword'])) {
            $errors['errorPassword'] = $data['errorPassword'];
        }
        if (!empty($data['errorBirth'])) {
            $errors['errorBirth'] = $data['errorBirth'];
        }

        return $errors;
    }
    
     /**
     * Check for validation and write errors if exsist
     * @return array
     */
    public static function validateData(): array
    {

        $data = self::sanitizeData();

        // check for name
        if (empty($data['fname'])) {
            $data['errorName'] = 'First name is blank';
        } elseif(strlen($data['fname']) < 2 || strlen($data['fname']) > 20) {
            $data['errorName'] = 'First name must be in range of 2-20 char...';
        }

        // check for lname
        if (empty($data['lname'])) {
            $data['errorLastName'] = 'Last name is blank';
        } elseif(strlen($data['lname']) < 2 || strlen($data['lname']) > 30) {
            $data['errorLastName'] = 'Last name must be in range of 2-30 char...';
        }

        // check for email
        if (empty($data['email'])) {
            $data['errorEmail'] = 'Email cannot be blank';
         }

         // check for gender
         if (empty($data['gender'])) {
             $data['errorGender'] = 'Gender must be selected';
         }

        // check for passwords

         if (empty($data['password']) || empty($data['cpassword'])) {
            $data['errorPassword'] = 'Password cannot be empty';
         } elseif(strlen($data['password']) < 5 || strlen($data['cpassword']) < 5) {
            $data['errorPassword'] = 'Password must be longer than 5 char...';
         }

        if ($data['password'] !== $data['cpassword']) {
            $data['errorPassword'] = 'Passowrd must be a same';
        }  

        // check birtth
        if (empty($data['birthDate'])) {
            $data['errorBirth'] = 'Birth Date cannot be empty';
        }

        if (empty($data['profilePic'])) {
            $data['profilePic'] = '/images/profile.jpg';
        }

        if (empty($data['coverPic'])) {
            $data['coverPic'] = 'images/cover.png';
        }

        return $data;
    }

    /**
     * Sanitize and return clean data
     * @return array $data
     */
    public static function sanitizeData(): array
    {
        if (isset($_POST['submit'])) {
            // Trim first//
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);
            // Delete sepcial chars
            $fname = htmlspecialchars(strip_tags($fname));
            $lname = htmlspecialchars(strip_tags($lname));
            $email = htmlspecialchars(strip_tags($email));
            $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // bug fix
            $password = htmlspecialchars(strip_tags($password));
            $cpassword = htmlspecialchars(strip_tags($cpassword));
            $birthDate = $_POST['birth'];
            $profilePic = self::uploadProfilePic($_FILES['profilePic']);
            $coverPic = self::uploadCoverPic($_FILES['coverPic']);
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'gender' => $gender,
                'password' => $password,
                'cpassword' => $cpassword,
                'birthDate' => $birthDate,
                'profilePic' => $profilePic,
                'coverPic' => $coverPic,
                'errorName' => '',
                'errorLastName' => '',
                'errorEmail' => '',
                'errorGender' => '',
                'errorPassword' => '',
                'errorBirth' => '',
                'errorPic' => '',
                'errorCoverPic' => ''
            ];
        }

        return $data;
    }

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
        } else {
            $filePath = '/images/profile.jpg';
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
        } else {
            $filePath = '/images/cover.png';
        }

        return $filePath;
    }
}