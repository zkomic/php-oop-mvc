<?php

// Base controller
// Loads the models and views

class Controller
{
    // Load model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = [])
    {

        // Check for the view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist.');
        }
    }
}
