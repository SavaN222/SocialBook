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
        $friendSuggestions = $this->friendModel->friendSuggestions($_SESSION['id']);
        $totalPosts = $this->postModel->numberOfUserPosts($_SESSION['id']);
        $totalFriends = $this->friendModel->totalFriend($_SESSION['id']);

        $data = [
            'posts' => $posts,
            'friendRequests' => $friendRequest,
            'countFriendRequest' => $countFriendRequest,
            'friendSuggestions' => $friendSuggestions,
            'totalPosts' => $totalPosts,
            'totalFriends' => $totalFriends
        ];

        return $this->view('pages/home', $data);
    }
    
    /**
     * If the user watches his profile load pages/myprofile other visitorprofile
     * @param int $id- user id in database from url example: /profile/5(userID) 
     */
    public function profile(int $id)
    {
        $userPosts = $this->postModel->getUserPosts($id);
        $userGallery = $this->galleryModel->getPhotos($id);
        $friendRequest = $this->friendModel->checkForRequest($_SESSION['id']);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        $getFriendStatus = $this->friendModel->friendStatus($_SESSION['id'], $id);
        $friendStatus = FriendStatus::friendStatus($getFriendStatus);


        if ($id == $_SESSION['id']) {
            $totalFriends = $this->friendModel->totalFriend($_SESSION['id']);

            $data = [
                'posts' => $userPosts,
                'gallery' => $userGallery,
                'friendRequests' => $friendRequest,
                'countFriendRequest' => $countFriendRequest,
                'totalFriends' => $totalFriends
        ];
            return $this->view('pages/myprofile', $data);
            
        } else {
            $userInfo = $this->userModel->getUserInfo($id);
            $totalFriends = $this->friendModel->totalFriend($id);
            $data = [
                'id' => $userInfo->id,
                'fname' => $userInfo->fname,
                'lname' => $userInfo->lname,
                'birthDate' => $userInfo->birth_date,
                'profilePic' => $userInfo->profile_pic,
                'coverPic' => $userInfo->cover_pic,
                'posts' => $userPosts,
                'gallery' => $userGallery,
                'friendRequests' => $friendRequest,
                'countFriendRequest' => $countFriendRequest,
                'status' => $friendStatus,
                'totalFriends' => $totalFriends
            ];

            return $this->view('pages/visitorprofile', $data);
        }
    }
}