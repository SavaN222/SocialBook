<?php

namespace App\appclass;

use App\appclass\ImagesValidation;

class RegisterValidation
{
    public static function checkErrors() 
    {
        $data = self::returnErrors();
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
        if (!empty($data['errorPic'])) {
            $errors['errorPic'] = $data['errorPic'];
        }


        return $errors;
    }
     /**
     * Write errors if exsist
     * @return array
     */
    public static function returnErrors()
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
            $data['errorPic'] = 'Profile Image must be in JPG/PNG format.';
        }

        return $data;
    }
    /**
     * Sanitize and return clean data
     * @return array
     */
    public static function sanitizeData()
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
            $profilePic = ImagesValidation::uploadProfilePic($_FILES['profilePic']);
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'gender' => $gender,
                'password' => $password,
                'cpassword' => $cpassword,
                'birthDate' => $birthDate,
                'profilePic' => $profilePic,
                'errorName' => '',
                'errorLastName' => '',
                'errorEmail' => '',
                'errorGender' => '',
                'errorPassword' => '',
                'errorBirth' => '',
                'errorPic' => ''
            ];
        }

        return $data;
    }
}