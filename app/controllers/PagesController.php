<?php 

use App\libraries\Controller;
/**
 * Login and Home page
 */
class PagesController extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('Login');
    }
    /**
     *  Home page-SocialBook Feed
     */
    public function index()
    {
        if (!isLoggedIn()) {
            redirect('pages/login');
        }
        return $this->view('pages/index');
    }
    /**
     * Set sessions and redirect user to home page if everything is ok
     * If something goes wrong, load login page with err messages
     * @return type
     */
    public function login()
    {
        if (!isset($_POST['submit'])) {
            return $this->view('pages/login');
        }

        if ($this->loginModel->userLogin()) {
            $user = $this->loginModel->userLogin();

            $_SESSION['id'] = $user->id;
            $_SESSION['fname'] = $user->fname;
            $_SESSION['lname'] = $user->lname;

            redirect('pages/index');

            // redirect to home page with session data
        } else {
            $data = [
                'errorMsg' => 'Try Again!'
            ];
            // Load with errors
            return $this->view('pages/login', $data);
        }
    }

}