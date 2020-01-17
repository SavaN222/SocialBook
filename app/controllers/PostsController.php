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
        $description = PostsValidation::sanitizePost();

        $this->postModel->addPost($_SESSION['id'], $description);

        redirect('pages/home');
    }
    
}