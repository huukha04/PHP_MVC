<?php

class ComponentController {
    use Controller;
    public function __construct() {
    }
    public function header() {

        if (isset($_SESSION)) {
            if(isset($_SESSION['user'])) {
                if($_SESSION['user']['role'] == 'admin') { 
                    $this->view('components/headerAdmin');
                    exit;
                } else {
                    $this->view('components/headerCustomer');
                    exit;
                }
            }
        }
        $this->view('components/header');
        exit;
    }
    public function footer() {
        $this->view('components/footer');
        exit;
    }
    public function sidebar() {
        $this->view('components/sidebar');
        exit;
    }
    public function darkLight() {
        $this->view('components/darkLight');
        exit;
    }
    public function ticket() {
        $this->view('components/ticket');
        exit;
    }
    
   
    


}
