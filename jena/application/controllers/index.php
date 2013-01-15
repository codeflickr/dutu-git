<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author Tafadzwa
 */
class Index extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('index/index');
     }
    
}

