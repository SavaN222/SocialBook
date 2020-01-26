<?php 

use App\libraries\Controller;
use App\appclass\UserValidation;

/**
 * UsersController handle EDIT, DELETE profile, and SEARCH method...
 */
class UsersController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->friendModel = $this->model('Friend');
    }

    /**
     * Edit PROFILE 
     */
    public function edit()
    {
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);

         if (!isset($_POST['submit'])) {
            $data = [
                'countFriendRequest' => $countFriendRequest
            ];

            return $this->view('pages/editprofile', $data);
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
                'userData' => $userData,
                'countFriendRequest' => $countFriendRequest
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
        $this->userModel->deleteComments($id);
        $this->userModel->deleteFriends($id);
        $this->userModel->deleteGallery($id);
        $this->userModel->deleteLikes($id);
        $this->userModel->deletePosts($id);

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