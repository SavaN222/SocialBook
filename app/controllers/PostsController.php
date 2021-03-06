<?php 

use App\libraries\Controller;
use App\appclass\PostsValidation;

/**
 * PostsController for posts, comments and likes
 */
class PostsController extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->friendModel = $this->model('Friend');
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

        $this->postModel->addComment($_SESSION['id'], $_POST['postId'], $_POST['postUser'], $description);
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
     * @param int $id
     */
    public function deletePost(int $id)
    {
        $this->postModel->deletePost($_SESSION['id'], $id);

        redirect('pages/index');
    }

    /**
     * Edit user profile
     * @param int $id
     */
     public function editProfile(int $id) 
     {
        $userPosts = $this->postModel->getUserPosts($id);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        
        if ($id == $_SESSION['id']) {
            $data = [
                'posts' => $userPosts,
                'countFriendRequest' => $countFriendRequest
        ];
            return $this->view('pages/editpost', $data);
        } 
    }

    /**
     * Update User post
     * @param int $id
     */
     public function updatePost(int $id)
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
     * Dislike post ajax live
     */
    public function dislikePost()
    {
        $this->postModel->dislikePost($_SESSION['id'], $_POST['postId']);
    }

    /**
     * Get total number of likes for post
     */
    public function loadLikeForPost()
    {
        $likes = $this->postModel->getLikesForPost($_GET['postId']);

        echo json_encode($likes);
    }

    /**
     * Set comment status to 1(read), this clears notification...
     * @param int $commentId 
     */
    public function readComment($commentId)
    {
        $this->postModel->readComment($commentId);

        return redirect('pages/index');
    }
}