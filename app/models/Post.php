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
        $this->db->query('SELECT count(l.id) as likes, p.description, p.user_id, p.id, p.date_added, u.fname, u.lname, u.profile_pic FROM (( posts p JOIN users u ON
        p.user_id = u.id)
        LEFT JOIN likes l ON p.id = l.post_id)
         GROUP BY p.id
         ORDER BY date_added DESC LIMIT 0, 5');

        $results = $this->db->getAll();

        return $results;
    }

    public function getLikesForPost($postId)
    {
        $this->db->query('SELECT l.post_id, count(l.id) as likes FROM likes l
            WHERE post_id = :postId
            GROUP BY l.post_id');

        $this->db->bind(':postId', $postId);

        $result = $this->db->getSingle();

        return $result;
    }

    public function getUserPosts($id)
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

    public function addComment($userId, $postId, $description)
    {
        $this->db->query('INSERT INTO comments(user_id, post_id, description)
            VALUES(:userId, :postId, :description)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    public function getCommentsForPosts($id)
    {
        $this->db->query('SELECT u.fname, u.lname, u.profile_pic, c.description, c.date_added, c.user_id FROM comments c JOIN users u ON c.user_id = u.id 
            WHERE post_id=:id 
            ORDER BY c.date_added ASC');

        $this->db->bind(':id', $id);

        $results = $this->db->getAll();

        return $results;
    }

    public function deletePost($userId, $postId)
    {
        $this->db->query('DELETE FROM posts WHERE user_id=:userId AND id=:postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }

    public function updatePost($userId, $postId, $description)
    {
        $this->db->query('UPDATE posts SET description=:description WHERE user_id=:userId and id=:postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    public function likePost($userId, $postId)
    {
        $this->db->query('INSERT INTO likes(user_id, post_id) VALUES(:userId, :postId)');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }

    public function dislikePost($userId, $postId)
    {
        $this->db->query('DELETE FROM likes WHERE user_id = :userId AND post_id = :postId');

        $this->db->bind(':userId', $userId);
        $this->db->bind(':postId', $postId);

        $this->db->execute();
    }
}