<?php 

namespace App\libraries;

/**
 * Base controller
 * Loads the models and views
 */
class Controller
{
    public function model($model)
    {
        require '../app/models/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require '../app/views/' . $view . '.php';
        } else {
            die('View does not exsist');
        }
    }
}