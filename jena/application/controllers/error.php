<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author Tafadzwa
 */
class Error extends Controller {
    //put your code here
    
    function __construct() {
        parent::__construct();      
    }
    
     public function index() {
        $this->view->msg = 'This is your error page';
        $this->view->render('error/index');
     }
    
}

