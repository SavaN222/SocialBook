<?php 

use App\libraries\Controller;

/**
 * SocialBook pages-News Feed,Profile
 */
class PagesController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->galleryModel = $this->model('Gallery');
    }
    /**
     *  If user loggedin, load home page-news feed
     */
    public function index()
    {
        if (!isLoggedIn()) {
            redirect('login/login');
        }

        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        return $this->view('pages/home', $data);
    }
    /**
     * If the user watches his profile load pages/myprofile other visitorprofile
     * @param $id- user id in database from url /profile/5[userID] 
     */
    public function profile($id)
    {
        $userPosts = $this->postModel->getUserPosts($id);
        $userGallery = $this->galleryModel->getPhotos($id);
        
        if ($id == $_SESSION['id']) {
            $data = [
                'posts' => $userPosts,
                'gallery' => $userGallery
        ];
            return $this->view('pages/myprofile', $data);
        } else {
            $userInfo = $this->userModel->getUserInfo($id);
            $data = [
                'fname' => $userInfo->fname,
                'lname' => $userInfo->lname,
                'birthDate' => $userInfo->birth_date,
                'profilePic' => $userInfo->profile_pic,
                'posts' => $userPosts,
                'gallery' => $userGallery
            ];
            return $this->view('pages/visitorprofile', $data);
        }
    }
}