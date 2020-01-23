<?php 

use App\libraries\Controller;

use App\appclass\FriendStatus;

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
        $this->friendModel = $this->model('Friend');
    }

    /**
     *  If user loggedin, load home page-news feed
     */
    public function index()
    {
        if (!isLoggedIn()) {
            redirect('login/login');
        }

        $posts = $this->postModel->getPosts($_SESSION['id']);
        $friendRequest = $this->friendModel->checkForRequest($_SESSION['id']);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);

        $data = [
            'posts' => $posts,
            'friendRequests' => $friendRequest,
            'countFriendRequest' => $countFriendRequest
        ];

        return $this->view('pages/home', $data);
    }
    
    /**
     * If the user watches his profile load pages/myprofile other visitorprofile
     * @param $id- user id in database from url example: /profile/5(userID) 
     */
    public function profile($id)
    {
        $userPosts = $this->postModel->getUserPosts($id);
        $userGallery = $this->galleryModel->getPhotos($id);
        $friendRequest = $this->friendModel->checkForRequest($_SESSION['id']);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        $getFriendStatus = $this->friendModel->friendStatus($_SESSION['id'], $id);
        $friendStatus = FriendStatus::friendStatus($getFriendStatus);

        if ($id == $_SESSION['id']) {
            $data = [
                'posts' => $userPosts,
                'gallery' => $userGallery,
                'friendRequests' => $friendRequest,
                'countFriendRequest' => $countFriendRequest
        ];
            return $this->view('pages/myprofile', $data);
            
        } else {
            $userInfo = $this->userModel->getUserInfo($id);
            $data = [
                'id' => $userInfo->id,
                'fname' => $userInfo->fname,
                'lname' => $userInfo->lname,
                'birthDate' => $userInfo->birth_date,
                'profilePic' => $userInfo->profile_pic,
                'posts' => $userPosts,
                'gallery' => $userGallery,
                'friendRequests' => $friendRequest,
                'countFriendRequest' => $countFriendRequest,
                'status' => $friendStatus
            ];

            return $this->view('pages/visitorprofile', $data);
        }
    }
}