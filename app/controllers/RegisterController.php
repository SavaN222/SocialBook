<?php

use App\libraries\Controller;

/**
 * RegisterController
 */
class RegisterController extends Controller
{
    public function __construct()
    {
        // model
    }

    public function index()
    {
        return $this->view('register/index');
    }
}