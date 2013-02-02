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
 * @subpackage  database
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Database.php
 */
class Database extends PDO {

    function __construct() {
        $ini = parse_ini_file("application/configs/application.ini", false);
        parent::__construct(
                $ini['db.type']
                . ':host=' . $ini['db.params.host']
                . ';dbname=' . $ini['db.params.dbname'], $ini['db.params.username'], $ini['db.params.password']
        );
    }

}
