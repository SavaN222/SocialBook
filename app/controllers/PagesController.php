<?php 

use App\libraries\Controller;
/**
 * SocialBook pages-News Feed,Profile
 */
class PagesController extends Controller
{
    public function __construct()
    {
        // $this->loginModel = $this->model('Login');
    }
    /**
     *  If user loggedin, load home page-news feed
     */
    public function index()
    {
        if (!isLoggedIn()) {
            redirect('login/login');
        }
        return $this->view('pages/home');
    }
    /**
     * If the user watches his profile load pages/myprofile other visitorprofile
     * @param $id- user id in database from url /profile/5[userID] 
     */
    public function profile($id)
    {
        if ($id == $_SESSION['id']) {
            return $this->view('pages/myprofile');
        } else {
            return $this->view('pages/visitorprofile');
        }
    }

}