<?php

use App\libraries\Controller;
use App\appclass\RegisterValidation;

/**
 * RegisterController
 */
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->registerModel = $this->model('Register');
    }
   
    public function index()
    {
        return $this->view('register/index');
    }

    public function create()
    {
        if (!isset($_POST['submit'])) {
            redirect('register');
        }
       
        $errors = RegisterValidation::checkErrors();
        $userData = RegisterValidation::sanitizeData();

        if (empty($errors)) {
            $this->registerModel->create($userData);
        } else {
            $data = [
                'errors' => $errors,
                'userData' => $userData
            ];

            return $this->view('register/index', $data);
        }
    }

}

