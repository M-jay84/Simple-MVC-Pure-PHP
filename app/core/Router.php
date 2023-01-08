<?php

namespace core;

/*
* Run App From URL Params
* Examaple domain/controller/method/param
*/
class Router
{
    protected $currentController = 'Home'; // Default controller
    protected $currentMethod = 'index'; // Default method
    protected $params = []; // Set initial empty params array

    public function __construct()
    {
        // Get Url
        $url = $this->getUrl();
        // Get Controller
        $this->currentController = @ucwords($url[0]) == '' ? 'Home' : @ucwords($url[0]);

        // Look in controllers folder for controller
        if (file_exists('../app/controllers/' . $this->currentController . '.php')) {
            unset($url[0]);
            require_once '../app/controllers/' . $this->currentController . '.php';
            $classname = $this->currentController;
        } else {
            echo '<br>controller error<br>';
        }
        
        // Instantiate the current controller
        $namespace = "controllers\\$classname";
        $this->currentController = new $namespace();

        // Check if second part of url is set (method)
        if (isset($url[1])) {
            // Check if method/function exists in current controller class
            if (method_exists($this->currentController, $url[1])) {
                // Set current method if it exsists
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Get params - Any values left over in url are params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with an array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Construct URL From $_GET['url']
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
