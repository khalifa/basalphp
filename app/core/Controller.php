<?php

class Controller
{
    public function __construct()
    {
        echo 'Controller created<br>';
    }

    // Load a model
    public function model($model)
    {
        echo 'Model ' . $model . '<br>';
        require_once '../app/models/'. $model . '.php';
        return new $model();
    }

    // Load a view
    public function view($view, $data = [])
    {
        echo 'View ' . $view . '<br>';
        require_once '../app/views/' . $view . '.php';
    }

}

?>