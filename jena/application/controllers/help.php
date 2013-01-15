<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Help
 *
 * @author Tafadzwa
 */
class Help extends Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();        
    }
    
    public function index() {
        $this->view->render('help/index');
    }
    
    public function other($arg = false){
        echo "Optional: " . $arg  . "<br>";
        //$model = new Help_Model();
        //$this->view->blah = $model->blah();
    }
}

