<?php
class pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function landing() {
        $data['page_title']= "Welcome";

        $this->view('pages/welcome',$data);
    }
}