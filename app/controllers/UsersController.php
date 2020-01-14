<?php 

use App\libraries\Controller;
use App\appclass\UserValidation;

/**
 * SocialBook pages-News Feed,Profile
 */
class UsersController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
  
    public function index()
    {
       
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
        logOut();
        redirect('register/register');   
    }

}