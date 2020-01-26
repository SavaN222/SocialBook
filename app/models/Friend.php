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
     * Send friend request to user
     * @param int $userId 
     * @param int $friendId 
     */
    public function sendFriendRequest(int $userId, int $friendId)
    {
        $this->db->query('INSERT INTO friends(user_id, friend_id, status) 
            VALUES(:userId, :friendId, :status)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);
        $this->db->bind(':status', self::REQUEST);

        $this->db->execute();
    }

    public function totalFriend($id)
    {
        $this->db->query('SELECT DISTINCT count(id) as total FROM friends 
            WHERE (user_id = :userId OR friend_id = :friendId) AND status = :status');

        $this->db->bind(':userId', $id);
        $this->db->bind(':friendId', $id);
        $this->db->bind(':status', self::FRIEND);

        $result = $this->db->getSingle();

        return $result;
    }

    /**
     * Check if user have friend requests and return all friend request.
     * @param int $id
     */
    public function checkForRequest(int $id)
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
     * @param int $id
     */
    public function countFriendRequest(int $id)
    {
        $this->db->query('SELECT count(id) as total FROM friends 
            WHERE friend_id = :id AND status = :status ' );

        $this->db->bind(':id', $id);
        $this->db->bind(':status', self::REQUEST);

        $result = $this->db->getSingle();

        return $result;
    }

    /**
     * Accept Friend Request
     * @param id $senderId 
     * @param id $recipientId 
     */
    public function acceptFriendRequest(int $senderId, int $recipientId)
    {
        $this->db->query('UPDATE friends SET status = :status WHERE
        user_id = :senderId AND friend_id = :recipientId ');

        $this->db->bind(':status', self::FRIEND);
        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $this->db->execute();
    }

    /**
     * Reject friend request
     * @param int $senderId 
     * @param int $recipientId 
     */
    public function declineFriendRequest(int $senderId, int $recipientId )
    {
        $this->db->query('DELETE FROM friends WHERE
        user_id = :senderId AND friend_id = :recipientId ');

        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $this->db->execute();
    }

    /**
     * Check logged in user and profile visit user friend Status
     * [0=default, 1=on hold, 2 = friends]
     * @param int $senderId 
     * @param int $recipientId 
     */
    public function friendStatus(int $senderId, int $recipientId)
    {
        $this->db->query('SELECT status, user_id FROM friends WHERE
            (user_id = :senderId AND friend_id = :recipientId) OR
            (user_id = :recipientId AND friend_id = :senderId)');

        $this->db->bind(':senderId', $senderId);
        $this->db->bind(':recipientId', $recipientId);

        $result = $this->db->getSingle();

        return $result;
    }

    /**
     * Suggest users from database they are not friend
     * @param int $userId 
     */
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

    public function userFriends(int $userId)
    {
        $this->db->query('SELECT DISTINCT u.id, u.fname, u.lname, u.profile_pic, u.status FROM users u JOIN friends f
            ON (u.id = f.user_id OR u.id = f.friend_id) 
            WHERE (f.user_id = :userId OR f.friend_id = :userId) AND f.status = :status');

        $this->db->bind(':status', self::FRIEND);
        $this->db->bind(':userId', $userId);

        $results = $this->db->getAll();

        return $results;
    }
}