<?php

use App\libraries\Database; 

/**
 * Gallery class handle: insert new photo, get user photos and delete photo. 
 */
class Gallery
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Add new photo in profile gallery
     * @param int $userId 
     * @param string $photo 
     * @param string $description 
     */
    public function addPhoto(int $userId, string $photo, string $description)
    {
        $this->db->query('INSERT INTO gallery(user_id, photo, description)
            VALUES(:userId, :photo, :description)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':photo', $photo);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    /**
     * Get all user photos from gallery
     * @param int $id 
     */
    public function getPhotos(int $id)
    {
        $this->db->query('SELECT id, photo, description FROM gallery WHERE user_id = :id ORDER BY id DESC');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Delete photo from user gallery
     * @param int $userId 
     * @param int $photoId 
     */
    public function deletePhoto(int $userId, int $photoId)
    {
        $this->db->query('DELETE FROM gallery WHERE user_id=:userId AND id = :photoId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':photoId', $photoId);

        $this->db->execute();
    }
}