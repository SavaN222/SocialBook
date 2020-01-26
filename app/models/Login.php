<?php

use App\libraries\Database; 
use App\appclass\LoginValidation;

class Login
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Login user 
     */
    public function userLogin()
    {
        $data = LoginValidation::sanitizeData();
        $password = $this->getUserHashPass();

        $this->db->query('SELECT * FROM users WHERE email=:email AND password=:password');

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $password);

       $result = $this->db->getSingle();
       
       return $result;
    }

    /**
     * This method will be moved in appclass/LoginValidation
     * Check if the user input password compact with hash password from database
     * @return string
     */
    public function getUserHashPass(): string
    {
        $data = LoginValidation::sanitizeData();

        $this->db->query('SELECT password FROM users WHERE email=:email');

        $this->db->bind(':email', $data['email']);

        if ($this->db->getSingle()) {
            $userPassword = $this->db->getSingle();
        } else {
            return false;
        }

        if (password_verify($data['password'], $userPassword->password)) {
            $password = $userPassword->password;
        } else {
            return false;
        }

        return $password;
    }
}