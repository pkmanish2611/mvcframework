<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $controller = 'pages';
    protected $method = 'landing';
    protected $params = [];

    public function __construct(){
     

      $url = $this->getUrl();

    // Look in BLL for first value
    if (isset($url[0])) {
      if(file_exists('../app/controllers/' . strtolower($url[0]). '.php')){
        // If exists, set as controller
        $this->controller = strtolower($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }
    }

      // Require the controller
      require_once '../app/controllers/'. $this->controller . '.php';

      // Instantiate controller class
      $this->controller = new $this->controller;

      // Check for second part of url
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->controller, $url[1])){
          $this->method = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->controller, $this->method], $this->params);
      show($url);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }


