<?php

namespace App\Controller;

class DummyController extends AppController {
    
    public function index(){
        
    }
    public function login(){
        $this->viewBuilder()->setLayout('login');
    }
}
