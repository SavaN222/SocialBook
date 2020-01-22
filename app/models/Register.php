<?php

use App\libraries\Database; 

/**
 * Register new user
 */
class Register
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($userData)
    {
        $this->db->query('INSERT INTO users(fname,lname,gender,email,password,birth_date,profile_pic)
            VALUES(:fname, :lname, :gender, :email, :password, :birth_date, :profilePic)');

        $this->db->bind(':fname', $userData['fname']);
        $this->db->bind(':lname', $userData['lname']);
        $this->db->bind(':gender', $userData['gender']);
        $this->db->bind(':email', $userData['email']);
        $this->db->bind(':password',password_hash($userData['password'], PASSWORD_BCRYPT));
        $this->db->bind(':birth_date', $userData['birthDate']);
        $this->db->bind(':profilePic', $userData['profilePic']);

        $this->db->execute();
    }
}