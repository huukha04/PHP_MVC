<?php

class CustomerController {
    use Controller;
    public function __construct() {
    }

    public function profile() {
        $this->view('customer/profile');
    }
    public function order() {
        $this->view('customer/order');
    }
    


}