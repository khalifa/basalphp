<?php

/**
 * The application class.
 *
 * Handles the request for each call to the application
 * and calls the chosen controller and method after splitting the URL.
 *
 */
class App
{
    /**
     * Stores the controller from the split URL
     *
     * @var string
     */
    protected $controller = 'DefaultController';

    /**
     * Stores the method from the split URL
     * @var string
     */
    protected $method = 'defaultMethod';

    /**
     * Stores the parameters from the split URL
     * @var array
     */
    protected $params = [];

    public function __construct()
    {
        //echo 'App Created<br>';

        // Get broken up URL
        $url = $this->parseUrl();
        //echo 'parseUrl() ';
        //print_r($url);
        //echo '<br>';

        // Does the requested controller exist?
        // If so, set it and unset from URL array
        if(file_exists(INC_ROOT . '/app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        //echo 'Controller ' . $this->controller . '<br>';

        // Create controller
        require_once INC_ROOT . '/app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        //var_dump($this->controller);
        //echo '<br>';

        // Has a second parameter been passed?
        // If so, it might be the requested method
        if(isset($url[1])) {
            // Check if method exits
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //echo 'method '. $this->method . '<br>';

        // Set parameters to either the array values or an empty array
        $this->params = $url ? array_values($url) : [];
        //var_dump($this->params);
        //echo '<br>';

        // Call the chosen method on the chosen controller, passing
        // in the parameters array (or empty array if above was false)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the URL for the current request. Effectivly splits it, stores the controller
     * and the method for that controller.
     *
     * @return void
     */
    public function parseUrl()
    {
        if(isset($_GET['url'])) {
            //echo 'url ' . $_GET['url'] . '<br>';
            // Explode a trimmed and sanitized URL by /
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}

?>