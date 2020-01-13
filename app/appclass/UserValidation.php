<?php

namespace App\appclass;

class UserValidation
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
       
        if (!empty($data['errorPassword'])) {
            $errors['errorPassword'] = $data['errorPassword'];
        }
         if (!empty($data['errorBirth'])) {
            $errors['errorBirth'] = $data['errorBirth'];
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

        // check for passwords

         if (empty($data['password'])) {
            $data['errorPassword'] = 'Password cannot be empty';
         } elseif(strlen($data['password']) < 5) {
            $data['errorPassword'] = 'Password must be longer than 5 char...';
         }

        // check birtth
        if (empty($data['birthDate'])) {
            $data['errorBirth'] = 'Birth Date cannot be empty';
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
            $password = trim($_POST['password']);
            // Delete sepcial chars
            $fname = htmlspecialchars(strip_tags($fname));
            $lname = htmlspecialchars(strip_tags($lname));
            $password = htmlspecialchars(strip_tags($password));
            $birthDate = $_POST['birthDate'];
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'password' => $password,
                'birthDate' => $birthDate,
                'errorName' => '',
                'errorLastName' => '',
                'errorPassword' => '',
                'errorBirth' => ''
            ];
        }

        return $data;
    }
}