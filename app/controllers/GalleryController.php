<?php 

use App\libraries\Controller;
use App\appclass\GalleryValidation;
/**
 * PostsController for POSTS AND COMMENTS
 */
class GalleryController extends Controller
{
    public function __construct()
    {
        $this->galleryModel = $this->model('Gallery');
    }
    /**
     * Add new photo
     */
    public function add()
    {
        $data = GalleryValidation::sanitizeData();

        $this->galleryModel->addPicture($_SESSION['id'], $data['photo'], $data['description']);

        redirect('pages/profile/' . $_SESSION['id']);
    }
    /**
     * Get new comments LIVE ajax
     */
    public function get()
    {
        $comments = $this->postModel->getCommentsForPosts($_GET['postId']);
        
        echo json_encode($comments);
    }
}