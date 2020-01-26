<?php

use App\libraries\Database; 

/**
 * Register new user
 */
class Message
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get messages of both friend user
     * @param int $userId 
     * @param int $friendId 
     */
    public function getMessages(int $userId, int $friendId)
    {
        $this->db->query('SELECT user_id, text as message FROM messages WHERE
         (user_id = :userId AND friend_id = :friendId) OR
         (user_id = :friendId AND friend_id = :userId)
         ORDER BY date ASC');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Send text
     * @param int $userId 
     * @param int $friendId 
     * @param string $text 
     */
    public function sendText(int $userId, int $friendId, string $text)
    {
        $this->db->query('INSERT INTO messages(user_id, friend_id, text) VALUES 
            (:userId, :friendId, :text)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);
        $this->db->bind(':text', $text);

        $this->db->execute();
    }

    /**
     * Delete messages from database if users not along friends
     * @param int $userId 
     * @param int $friendId 
     */
    public function deleteChatIfNotFriends(int $userId, int $friendId)
    {
        $this->db->query('DELETE FROM messages WHERE (user_id = :userId AND friend_id = :friendId)
            OR (user_id = :friendId AND friend_id = :userId)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);

        $this->db->execute();
    }
}