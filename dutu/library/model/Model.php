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
 * @subpackage  model
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Model.php
 */
class Model {
    
    /**
     * @var fname - the name model
     *
     * @access protected
     */
    protected $db;
    
    /**
     * performs specific model initialization
     *
     * @access public
     * @author 
     */
    public function init() {
        //TODO override this method in your model and perform initialization
    }

    function __construct() {
        $this->db = new Database();
        
         //invoke the init method of the model in context
        $this->init();
    }
    
    
}
