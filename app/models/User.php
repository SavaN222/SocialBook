<?php

use App\libraries\Database; 

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserInfo($id)
    {

        $this->db->query('SELECT * FROM users where id=:id');

        $this->db->bind(':id', $id);
        
        $result = $this->db->getSingle();

        return $result;

    }

    public function updateUser($userData, $id)
    {
        $this->db->query('UPDATE users SET fname=:fname, lname=:lname, birth_date=:birthDate, password=:password, profile_pic=:profilePic WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':fname', $userData['fname']);
        $this->db->bind(':lname', $userData['lname']);
        $this->db->bind(':birthDate', $userData['birthDate']);
        $this->db->bind(':password',password_hash($userData['password'], PASSWORD_BCRYPT));
        $this->db->bind(':profilePic', $userData['profilePic']);
        $this->db->execute();
    }

    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM users WHERE id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
        
    }

    public function searchUsers($fname, $lname)
    {
        $this->db->query('SELECT * FROM users WHERE fname LIKE ? AND lname LIKE ?');

        $fname = trim(htmlspecialchars(strip_tags($fname)));
        $fname = "%{$fname}%";

        $lname = trim(htmlspecialchars(strip_tags($lname)));
        $lname = "%{$lname}%";

        $this->db->bind(1, $fname);
        $this->db->bind(2, $lname);

        $results = $this->db->getAll();
        return $results;
    }

}

