<?php 

namespace App\libraries;

/**
 * Base controller
 * Loads the models and views
 */
class Controller
{
    /**
     * Require database model in controller
     * @param string $model 
     * @return object
     */
    public function model(string $model)
    {
        require '../app/models/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    /**
     * Return html view|page with data
     * @param string $view 
     * @param array|null $data 
     */
    public function view(string $view, array $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require '../app/views/' . $view . '.php';
        } else {
            die('View does not exsist');
        }
    }
}