<?php

/*
 * This file is part of the <blah> package.
 *
 * @copyright Copyright &copy; 2009 Example, LLC
 * @link http://www.example.com Example, LLC.
 * @license http://www.example.com/licensing
 */

/**
 * Provides this and that functionality
 *
 * @package     
 * @subpackage  autoload
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Autoloader.php
 */
require 'configs/paths.php';

class Autoloader {

    /**
     * @var paths - array to hold paths to library classes
     *
     * @access private
     */
    private $paths = array(
        'library/',
        'library/util/',
        'library/controller/',
        'library/database/',
        'library/form/',
        'library/model/',
        'library/session/',
        'library/view/'
    );

    /**
     * @var loader - an Autoloader object
     *
     * @access private
     */
    private static $loader;

    /**
     * autoloads application library classes 
     *
     * @access public
     * @param name - class name
     * @author 
     */
    private function loader($name) {

        //walk through each library directory path
        foreach ($this->paths as $path) {
            $file = $path . $name . '.php';

            //does the .php file of the library class exist
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    private function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    /**
     * creates a instance of Autoloader class
     *
     * @access public
     * @author 
     */
    public static function init() {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    /**
     * runs the application Bootstrap
     *
     * @access public
     * @author 
     */
    public function run() {
        $bootstrap = new Bootstrap(new Dutu);
        $bootstrap->loadController();
        $bootstrap->callMethod();
    }

}

