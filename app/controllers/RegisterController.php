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
        // model
    }
   
    public function index()
    {
        return $this->view('register/index');
    }

    // public function store()
    // {
       
    // }

    public function test()
    {
        $test = RegisterValidation::returnErrors();
        var_dump($test);
        exit();
    }

   
}