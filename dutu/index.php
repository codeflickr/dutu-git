<?php

//ensures that the application's autoloader is on include_path
set_include_path( get_include_path() . PATH_SEPARATOR . 'library/autoload/');
require 'AutoLoader.php';

//create the application bootstrap and run it
Autoloader::init()->run();

