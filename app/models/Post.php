<?php

use App\libraries\Database; 

/**
 * Post class handle: 
 * CRUD operation for posts.
 * Create and Read comments.
 * Like/Dislike post.
 */
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Add new post
     * @param int $id 
     * @param string $description 
     */
    public function addPost(int $id, string $description)
    {
        $this->db->query('INSERT INTO posts(user_id, description)
            VALUES(:id, :description)');

        $this->db->bind(':id', $id);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    /**
     * Get ONLY! friends and logged user posts
     * @param int $id 
     */
    public function getPosts(int $id)
    {
        $this->db->query('SELECT count(l.id) as likes, p.description, p.user_id, p.id, p.date_added, u.fname, u.lname, u.profile_pic FROM (( posts p JOIN users u ON
        p.user_id = u.id)
        LEFT JOIN likes l ON p.id = l.post_id)
        JOIN friends f ON (p.user_id = f.friend_id OR p.user_id = f.user_id)
        WHERE (f.user_id = :id OR f.friend_id = :id) AND f.status = "2" OR p.user_id = :id
         GROUP BY p.id
         ORDER BY date_added DESC LIMIT 0, 5');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Count user posts
     * @param int $userId 
     */
    public function numberOfUserPosts(int $userId)
    {
        $this->db->query('SELECT count(id) as total FROM posts WHERE user_id = :userId');

        $this->db->bind(':userId', $userId);

        $result = $this->db->getSingle();

        return $result;
    }

    /**
     * Get number of likes for post
     * @param int $postId 
     */
    public function getLikesForPost(int $postId)
    {
        $this->db->query('SELECT l.post_id, count(l.id) as likes FROM likes l
            WHERE post_id = :postId
            GROUP BY l.post_id');

        $this->db->bind(':postId', $postId);

        $result = $this->db->getSingle();

        return $result;
    }

    /**
     * Get ONLY logged user post for profile post section
     * @param int $id 
     */
    public function getUserPosts(int $id)
    {
        $this->db->query('SELECT count(l.id) as likes, p.description, p.user_id, p.id, p.date_added, u.fname, u.lname, u.profile_pic FROM (( posts p JOIN users u ON
            p.user_id = u.id)
             LEFT JOIN likes l ON p.id = l.post_id)
             WHERE p.user_id = :id 
             GROUP BY p.id
             ORDER BY date_added DESC LIMIT 0, 5');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * Add new comment for post
     * @param int $userId 
     * @param int $postId 
     * @param string $description 
     */
    public function addComment(int $userId, int $postId, string $description)
    {
        $this->db->query('INSERT INTO comments(user_id, post_id, description)
            VALUES(:userId, :postId, :description)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    /**
     * Get comment and user info for each post
     * @param int $id 
     */
    public function getCommentsForPosts(int $id)
    {
        $this->db->query('SELECT u.fname, u.lname, u.profile_pic, c.description, c.date_added, c.user_id FROM comments c JOIN users u ON c.user_id = u.id 
            WHERE post_id=:id 
            ORDER BY c.date_added ASC');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

    /**
     * The user deletes his post
     * @param int $userId 
     * @param int $postId 
     */
    public function deletePost(int $userId, int $postId)
    {
        $this->db->query('DELETE FROM posts WHERE user_id=:userId AND id=:postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }

    /**
     * The user update his post
     * @param int $userId 
     * @param int $postId 
     * @param string $description 
     */
    public function updatePost(int $userId, int $postId, string $description)
    {
        $this->db->query('UPDATE posts SET description=:description WHERE user_id=:userId and id=:postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    /**
     * Like post
     * @param int $userId 
     * @param int $postId 
     */
    public function likePost(int $userId, int $postId)
    {
        $this->db->query('INSERT INTO likes(user_id, post_id) VALUES(:userId, :postId)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }

    /**
     * Dislike post
     * @param int $userId 
     * @param int $postId 
     */
    public function dislikePost(int $userId, int $postId)
    {
        $this->db->query('DELETE FROM likes WHERE user_id = :userId AND post_id = :postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }
}