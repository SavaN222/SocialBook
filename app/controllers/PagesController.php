<?php 

use App\libraries\Controller;
use App\appclass\UserValidation;

/**
 * SocialBook pages-News Feed,Profile
 */
class PagesController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
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
            $userInfo = $this->userModel->getUserInfo($id);
            $data = [
                'fname' => $userInfo->fname,
                'lname' => $userInfo->lname,
                'birthDate' => $userInfo->birth_date
            ];
            return $this->view('pages/visitorprofile', $data);
        }
    }

    public function edit()
    {
         if (!isset($_POST['submit'])) {
            return $this->view('pages/editprofile');
        }
        $errors = UserValidation::checkErrors();
        $userData = UserValidation::sanitizeData();
        $id = $_SESSION['id'];

        if (empty($errors)) {
            $this->userModel->updateUser($userData, $id);
            logOut();
            redirect('login/login');
        } else {
            $data = [
                'errors' => $errors,
                'userData' => $userData
            ];
        return $this->view('pages/editprofile', $data);
    }

    }

    public function delete()
    {
        $id = $_SESSION['id'];

        $this->userModel->deleteUser($id);

        redirect('register/register');   
    }

}