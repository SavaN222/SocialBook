<?php

use App\libraries\Database; 

/**
 * Class user handle:
 * Get user info, update user info, user delete profile.
 * Search all SocialBook users.
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get user info
     * @param int $id 
     */
     public function getUserInfo(int $id)
     {
        $this->db->query('SELECT * FROM users WHERE id=:id');

        $this->db->bind(':id', $id);
        
        $result = $this->db->getSingle();

        return $result;
     } 

     /**
      * Update user info
      * @param array $userData 
      * @param int $id 
      */
    public function updateUser(array $userData, int $id)
    {
        $this->db->query('UPDATE users SET fname=:fname, lname=:lname, birth_date=:birthDate, password=:password, profile_pic=:profilePic, cover_pic=:coverPic WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':fname', $userData['fname']);
        $this->db->bind(':lname', $userData['lname']);
        $this->db->bind(':birthDate', $userData['birthDate']);
        $this->db->bind(':password',password_hash($userData['password'], PASSWORD_BCRYPT));
        $this->db->bind(':profilePic', $userData['profilePic']);
        $this->db->bind(':coverPic', $userData['coverPic']);

        $this->db->execute();
    }

    /**
     * User delete his profile
     * @param int $id 
     */
    public function deleteUser(int $id)
    {
        $this->db->query('DELETE FROM users WHERE id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    /**
     * If user delete his profile, this method will be called
     * Delete user comments from database.
     * @param int $id 
     */
    public function deleteComments(int $id)
    {
        $this->db->query('DELETE FROM comments WHERE user_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

     /**
     * If user delete his profile, this method will be called
     * Delete user friendship from database.
     * @param int $id 
     */
    public function deleteFriends(int $id)
    {
        $this->db->query('DELETE FROM friends WHERE user_id = :id OR friend_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

     /**
     * If user delete his profile, this method will be called
     * Delete user likes from database.
     * @param int $id 
     */
    public function deleteLikes(int $id)
    {
        $this->db->query('DELETE FROM likes WHERE user_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

     /**
     * If user delete his profile, this method will be called
     * Delete user gallery from database.
     * status = "0" -> photo deleted
     * @param int $id 
     */
    public function deleteGallery(int $id)
    {
        $this->db->query('UPDATE gallery SET status = "0" WHERE user_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

     /**
     * If user delete his profile, this method will be called
     * Delete user posts from database.
     * @param int $id 
     */
    public function deletePosts(int $id)
    {
        $this->db->query('DELETE FROM posts WHERE user_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    /**
     * Search users from network
     * @param string $fname 
     * @param string $lname 
     */
    public function searchUsers(string $fname, string $lname)
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