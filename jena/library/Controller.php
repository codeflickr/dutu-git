<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Tafadzwa
 */
class Controller {
    //put your code here
    
    function __construct() {
         //echo "Main controller";
         $this->view = new View();
         
    }
    
    function loadModel($name) {
        $path = MODEL_PATH . $name . '_model.php'; 
         if (file_exists($path)) {
             require_once MODEL_PATH . $name . '_model.php';
             $modelName = $name . '_Model';
             $this->model = new $modelName;
         }
    }
}

