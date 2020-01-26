<?php 

use App\libraries\Controller;

/**
 * Login and Logout
 */
class LoginController extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('Login');
        $this->userModel = $this->model('User');
    }

    /**
     *  Login page
     */
    public function index()
    {
        return $this->view('login/login');
    }

    /**
     * Logout user and redirect to login
     */
    public function logoutUser()
    {
        $this->userModel->userStatus($_SESSION['id'], '0');
        logOut();
        redirect('login/login');
    }
    
    /**
     * Set sessions and redirect user to home page if everything is ok
     * If something goes wrong, load login page with err messages
     */
    public function login()
    {
        if (!isset($_POST['submit'])) {
            return $this->view('login/login');
        }

        if ($this->loginModel->userLogin()) {

            $user = $this->loginModel->userLogin();
            
            $_SESSION['id'] = $user->id;
            $_SESSION['fname'] = $user->fname;
            $_SESSION['lname'] = $user->lname;
            $_SESSION['birthDate'] = $user->birth_date;
            $_SESSION['profilePic'] = $user->profile_pic;
            $_SESSION['coverPic'] = $user->cover_pic;
            $_SESSION['status'] = $user->status;

            $this->userModel->userStatus($_SESSION['id'], '1');

            redirect('pages/home');

        } else {
            $data = [
                'errorMsg' => 'Try Again!'
            ];
            // Load with errors
            return $this->view('login/login', $data);
        }
    }
}