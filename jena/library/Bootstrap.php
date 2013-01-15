<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author Tafadzwa
 */
class Bootstrap {
    //put your code here
    
    function __construct() {
        $url  = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/' , $url);
        
        //print_r($url);
        
        if (empty ($url[0])) {
            require CONTROLLER_PATH . 'index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        
        $file =  CONTROLLER_PATH . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require CONTROLLER_PATH . 'error.php';
            $controller = new Error();
            return false;
        }
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        
        //calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                echo "Error: Method does not exist";
            }            
        } else {
            if (isset($url[1])){
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();  
                } else {
                    echo "Error: Method does not exist";
                }                                
            }   else {
                 $controller->index();
            }
        }       
    }
    
}

