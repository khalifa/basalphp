<?php

/**
 * The controller class.
 *
 * The base controller for all other controllers. Extend this for each
 * created controller and get access to it's wonderful functionality.
 */
class Controller
{
    public function __construct()
    {
        //echo 'Controller created<br>';
    }

    /**
     * Load a model
     *
     * @param string $model The name of the model to load
     *
     * @return object
     */
    public function model($model)
    {
        //echo 'Model ' . $model . '<br>';
        require_once INC_ROOT . '/app/models/'. $model . '.php';
        return new $model();
    }

    /**
     * Render a view
     *
     * @param string $viewName The name of the view to include
     * @param array  $data Any data that needs to be available within the view
     *
     * @return void
     */
    public function view($viewName, $data = [], $postData = [])
    {
        //echo 'View ' . $viewName . '<br>';
        require_once INC_ROOT . '/app/views/' . $viewName . '.php';
    }

}

?>