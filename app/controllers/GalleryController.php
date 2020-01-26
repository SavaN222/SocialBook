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
     * Update photo status in database to 0(deleted)
     * @param int $id
     */
    public function delete(int $id)
    {   
        $this->galleryModel->updatePhotoStatus($_SESSION['id'], $id);

        $this->deleteImage();
    }

    /**
     * Delete image from images/gallery if database status = 0(deleted)
     */
    public function deleteImage()
    {
        $images = $this->galleryModel->getDeletedPhotos($_SESSION['id']);

        foreach ($images as $image) {
            $deletePath = $image->photo;
            unlink($deletePath);
        }

        redirect('pages/profile/' . $_SESSION['id']);
    }
}