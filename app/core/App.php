<?php

class App
{
    // Default controller
    protected $controller = 'DefaultController';

    // Default method
    protected $method = 'defaultMethod';

    // Default parameters
    protected $params = [];

    public function __construct()
    {
        echo 'App Created<br>';

        // Parse url
        $url = $this->parseUrl();
        echo 'parseUrl() ';
        print_r($url);
        echo '<br>';

        // Check if controller exists
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        echo 'Controller ' . $this->controller . '<br>';

        // Create controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        var_dump($this->controller);
        echo '<br>';

        // Check if method url exits
        if(isset($_GET['url'])) {
            // Check if method exits
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        echo 'method '. $this->method . '<br>';

        // Set params
        $this->params = $url ? array_values($url) : [];
        var_dump($this->params);
        echo '<br>';

        // Call function with params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])) {
            echo 'url ' . $_GET['url'] . '<br>';
            // Sanatize url and explode
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}

?>