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
 * @subpackage  util
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Dutu.php
 */
class Dutu {

    /**
     * @var dutu - a dependency injection container object
     *
     * @access private
     */
    private $dutu;

    /**
     * @var components - an array to hold default components
     *
     * @access protected
     */
    private $components = array(       
        'form' => 'Form',
        'session' => 'Session',
        'view' => 'View'
    );

    /**
     * @var values - an array to hold dynamically created properties
     *
     * @access protected
     */
    protected $values = array();

    function __construct() {
        
        //set the object in context to an instance field
        $this->dutu = $this;
    }
    
    /**
     * creates an object property dynamically
     *
     * @access public
     * @param key - a unique id for idenfying the associated value
     * @param value - a value associated with a key
     * @author 
     */
    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    /**
     * retrieves an object property dynamically
     *
     * @access public
     * @param key - an unique id for identifying the associated value
     * @author 
     */
    public function __get($key) {
        if (is_callable($this->values[$key])) {
            return $this->values[$key]($this);
        } else {
            return $this->values[$key];
        }
    }

    /**
     * registers all default controller components
     *
     * @access public
     * @author 
     */
    public function registerComponents() {
        foreach ($this->components as $key => $value) {           
            $classId = $key . '_class';
            
            //create a dutu property and map its class id to a class name
            $this->dutu->$classId = $value;
            
            //create a callback function which creates a service object
            $this->dutu->$key = function($container) use($classId) {
                
                //create and return an object associated with the class id
                return new $container->$classId();
            };
        }
    }

}

