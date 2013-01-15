<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Tafadzwa
 */
class View {
    //put your code here
    
    function __construct() {
         //echo "This is the view" . "<br>";
    }
    
    public function  render($name) {
        require VIEW_PATH . $name . '.php';
    }
}

