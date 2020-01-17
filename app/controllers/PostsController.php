<?php 

use App\libraries\Controller;
use App\appclass\PostsValidation;
/**
 * PostsController for new posts,likes and comments
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

    public function add()
    {
        $description = PostsValidation::sanitizeDescription();

        $this->postModel->addComment($_SESSION['id'], $_POST['postId'], $description);

        redirect('pages/home');
    }

    public function get()
    {
        $comments = $this->postModel->getCommentsForPosts($_GET['postId']);
        
        echo json_encode($comments);
    }
    
}