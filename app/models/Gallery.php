<?php

use App\libraries\Database; 

class Gallery
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPicture($userId, $photo, $description)
    {
        $this->db->query('INSERT INTO gallery(user_id, photo, description)
            VALUES(:userId, :photo, :description)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':photo', $photo);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    public function getPictures($id)
    {
        $this->db->query('SELECT photo, description FROM gallery WHERE user_id = :id ORDER BY id DESC');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

}