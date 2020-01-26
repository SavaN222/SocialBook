<?php

use App\libraries\Database; 

/**
 * Gallery class handle: insert new photo, get user photos and delete photo. 
 */
class Gallery
{
    private $db;

    private const DELETE = '0';
    private const ACTIVE = '1';
    
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
        $this->db->query('SELECT id, photo, description FROM gallery WHERE user_id = :id AND status = :status ORDER BY id DESC');

        $this->db->bind(':id', $id);
        $this->db->bind(':status', self::ACTIVE);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Update photo status to 0(deleted)
     * @param int $userId 
     * @param int $photoId 
     */
    public function updatePhotoStatus(int $userId, int $photoId)
    {
        $this->db->query('UPDATE gallery SET status=:status WHERE user_id=:userId AND id = :photoId');

        $this->db->bind(':status', self::DELETE);
        $this->db->bind(':userId', $userId);
        $this->db->bind(':photoId', $photoId);

        $this->db->execute();
    }

    /**
     * Get all user photos which status = 0[deleted]
     * @param int $userId 
     */
    public function getDeletedPhotos(int $userId)
    {
        $this->db->query('SELECT photo FROM gallery WHERE status = :status AND user_id = :userId');

        $this->db->bind('userId', $userId);
        $this->db->bind(':status', self::DELETE);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Delete all photos from gallery which status = 0(deleted)
     */
    public function deletePhotos()
    {
        $this->db->query('DELETE FROM gallery WHERE status = :status');

        $this->db->bind(':status', self::DELETE);

        $this->db->execute();
    }
}