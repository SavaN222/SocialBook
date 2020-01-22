<?php 

use App\libraries\Controller;
use App\appclass\GalleryValidation;

/**
 * GalleryController for myprofile gallery
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

        $this->galleryModel->addPhoto($_SESSION['id'], $data['photo'], $data['description']);

        redirect('pages/profile/' . $_SESSION['id']);
    }
    
    /**
     * Delete photo from gallery
     */
    public function delete($id)
    {
        $this->galleryModel->deletePhoto($_SESSION['id'], $id);

        redirect('pages/profile/' . $_SESSION['id']);
    }
}