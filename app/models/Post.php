<?php

use App\libraries\Database; 

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPost($id, $description)
    {
        $this->db->query('INSERT INTO posts(user_id, description)
            VALUES(:id, :description)');

        $this->db->bind(':id', $id);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    public function getPosts()
    {
        $this->db->query('SELECT p.description, p.user_id, p.date_added, u.fname, u.lname, u.profile_pic FROM posts p JOIN users u ON
        p.user_id = u.id 
         ORDER BY date_added DESC LIMIT 0, 5');

        $results = $this->db->getAll();

        return $results;
    }
}