<?php
class pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function landing() {
        $data['page_title']= "Welcome";
         
        $this->view('pages/welcome',$data);
    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        //$url = $this->getUrl(); 
        //if (isset($url[2])) 
        //print_r($url[2]); 
    }
}