<?php

// App Core Class
// creates URL & loads core controller
// URL FORMAT -/controller/method/params

class Core
{
    protected $currentController = 'Pages'; //default 
    protected $currentMethod = 'index';
    protected $params = [];
    

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        // Look in controllers for first value
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) { //ucwords - converts the first character to uppercase
            // set as controller
            $this->currentController = ucwords($url[0]);
            // unset 0 index
            unset($url[0]); // destroys single [0] element of array
        }

        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // instantiate controller class
        // $pages = new Pages();
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if(isset($url[1])) {
            // Check if method exists in controller
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl()
    {
        if(isset($_GET['url'])) {
            //strip ending '/'
            $url = rtrim($_GET['url'], '/');
            // sanitize url (removes unwanted characters)
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return ['pages'];
    }
}
