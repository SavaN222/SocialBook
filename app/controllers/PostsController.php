<?php 

use App\libraries\Controller;
use App\appclass\PostsValidation;

/**
 * PostsController for POSTS AND COMMENTS
 */
class PostsController extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    /**
     * Create new post
     */
    public function create()
    {
        $description = PostsValidation::sanitizeDescription();

        $this->postModel->addPost($_SESSION['id'], $description);

        redirect('pages/home');
    }

    /**
     * Add new comment ajax
     */
    public function add()
    {
        $description = PostsValidation::sanitizeDescription();

        $this->postModel->addComment($_SESSION['id'], $_POST['postId'], $description);
    }

    /**
     * Get new comments LIVE ajax
     */
    public function get()
    {
        $comments = $this->postModel->getCommentsForPosts($_GET['postId']);
        
        echo json_encode($comments);
    }

    /**
     * User delete post
     */
    public function deletePost($id)
    {
        $this->postModel->deletePost($_SESSION['id'], $id);

        redirect('pages/index');
    }

    /**
     * Edit user profile
     */
     public function editProfile($id) 
     {
        $userPosts = $this->postModel->getUserPosts($id);
        
        if ($id == $_SESSION['id']) {
            $data = [
                'posts' => $userPosts
        ];
            return $this->view('pages/editpost', $data);
        } 
    }

    /**
     * Update User post
     */
     public function updatePost($id)
    {
        $description = PostsValidation::sanitizeDescription();

        $this->postModel->updatePost($_SESSION['id'], $id, $description);

        redirect('pages/home');
    }

    /**
     * Like post ajax live
     */
    public function likePost()
    {
        $this->postModel->likePost($_SESSION['id'], $_POST['postId']);
    }

    /**
     * Get total number of likes for post
     */
    public function loadLikeForPost()
    {
        $likes = $this->postModel->getLikesForPost($_GET['postId']);

        echo json_encode($likes);
    }
}