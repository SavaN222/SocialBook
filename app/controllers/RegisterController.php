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
   /**
    * Load register page, if registration invalid load with errors
    */
   
    public function index()
    {
        if (!isset($_POST['submit'])) {
            return $this->view('register/register');
        }

        $errors = RegisterValidation::checkErrors();
        $userData = RegisterValidation::sanitizeData();

        if (empty($errors)) {
            $this->registerModel->create($userData);
            redirect('login/login');
        } else {
            $data = [
                'errors' => $errors,
                'userData' => $userData
            ];

            return $this->view('register/register', $data);
        }
    }
}

