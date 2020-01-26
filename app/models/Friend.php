<?php

use App\libraries\Database; 

class Friend
{
    private $db;

    private const NO_FRIEND = '0'; 
    private const REQUEST = '1'; 
    private const FRIEND = '2';

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Send user friend request 
     */
    public function sendFriendRequest($userId, $friendId)
    {
        $this->db->query('INSERT INTO friends(user_id, friend_id, status) 
            VALUES(:userId, :friendId, :status)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);
        $this->db->bind(':status', self::REQUEST);

        $this->db->execute();
    }

    /**
     * Check if user have friend requests and return all friend request.
     */
    public function checkForRequest($id)
    {
        $this->db->query('SELECT f.user_id, f.status, u.id, u.fname, u.lname, u.profile_pic FROM friends f
        JOIN users u ON f.user_id = u.id
        WHERE f.friend_id = :id AND f.status = :status ');

        $this->db->bind('id', $id);
        $this->db->bind('status', self::REQUEST);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Count number of 'on hold' friend requests
     */
    public function countFriendRequest($id)
    {
        $this->db->query('SELECT count(id) as total FROM friends 
            WHERE friend_id = :id AND status = :status ' );

        $this->db->bind(':id', $id);
        $this->db->bind(':status', self::REQUEST);

        $result = $this->db->getSingle();

        return $result;
    }

    public function acceptFriendRequest($senderId, $recipientId )
    {
        $this->db->query('UPDATE friends SET status = :status WHERE
        user_id = :senderId AND friend_id = :recipientId ');

        $this->db->bind(':status', self::FRIEND);
        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $this->db->execute();
    }

    public function declineFriendRequest($senderId, $recipientId )
    {
        $this->db->query('DELETE FROM friends WHERE
        user_id = :senderId AND friend_id = :recipientId ');

        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $this->db->execute();
    }

    public function friendStatus($senderId, $recipientId)
    {
        $this->db->query('SELECT status, user_id FROM friends WHERE
            (user_id = :senderId AND friend_id = :recipientId) OR
            (user_id = :recipientId AND friend_id = :senderId)');

        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $result = $this->db->getSingle();

        return $result;
    }

    public function friendSuggestions($userId)
    {
        $this->db->query('SELECT u.id, u.fname, u.lname, u.profile_pic FROM users u 
            WHERE u.id <> :userId AND NOT EXISTS(SELECT * FROM friends WHERE (user_id = u.id and friend_id = :userId) 
            OR (friend_id = u.id and user_id = :userId))  
            LIMIT 5');

        $this->db->bind(':userId', $userId);

        $results = $this->db->getAll();

        return $results;
    }

}