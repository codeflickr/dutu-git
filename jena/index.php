<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//ensure the application environment library and config file is on include_path
set_include_path(
        get_include_path()
        . PATH_SEPARATOR
        . 'config/'
        . PATH_SEPARATOR
        . 'library/'
);
require 'paths.php';
require 'database.php';
require 'AutoLoader.php';

//instantiating Autoloader
$loader = new Autoloader;

//create application, bootstrap, and run
$loader->run();

