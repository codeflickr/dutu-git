<?php
/*
 * This file is part of the  package.
 *
 * @copyright Copyright &copy; 2009 Example, LLC
 * @link http://www.example.com Example, LLC.
 * @license http://www.example.com/licensing
 */

/**
 * Provides a this and that functionality
 *
 * @package     
 * @subpackage  library
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Autoloader.php
 */
class Autoloader {
   
    public function __construct(){
        spl_autoload_register(array($this, 'library'));
    }

    private function library($fileName) {        
        //check if the file exists
        if(file_exists(LIBRARY_PATH . $fileName . '.php')) {

            //only require the class once
            require_once LIBRARY_PATH . $fileName . '.php';
        }
    }    
  
    public function run() {       
        $bootstrap = new Bootstrap();
    }    
    
    
}

