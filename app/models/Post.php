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
        $this->db->query('SELECT p.description, p.user_id, p.id, p.date_added, u.fname, u.lname, u.profile_pic FROM posts p JOIN users u ON
        p.user_id = u.id 
         ORDER BY date_added DESC LIMIT 0, 5');

        $results = $this->db->getAll();

        return $results;
    }

    public function getUserPosts($id)
    {
        $this->db->query('SELECT p.description, p.user_id, p.id, p.date_added, u.fname, u.lname, u.profile_pic FROM posts p JOIN users u ON
            p.user_id = u.id 
         WHERE p.user_id = :id 
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

}