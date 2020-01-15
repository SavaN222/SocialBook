<?php 

use App\libraries\Controller;
use App\appclass\UserValidation;

/**
 * UsersController handle EDIT and DELETE profile, and SEARCH method...
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
    /**
     * Edit PROFILE 
     */
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
            unlink(URLROOT . '/images/profile' . $_SESSION['profilePic']);
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
    /**
     * Delete Profile
     */
    public function delete()
    {
        $id = $_SESSION['id'];

        $this->userModel->deleteUser($id);
        logOut();
        redirect('register/register');   
    }
    /**
     * Search USERS method for AJAX CALL
     * @return JSON
     */
    public function getUsers()
    {
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
         
        $users = $this->userModel->searchUsers($fname, $lname);
        
        echo json_encode($users);
    }

}