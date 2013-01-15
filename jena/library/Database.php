<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Database extends PDO{

    function __construct() {
        parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    }

}
