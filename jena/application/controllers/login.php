<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Tafadzwa
 */
class Login extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('login/index');
     }
    
     public function submit() {
         $this->model->submit();
     }
}