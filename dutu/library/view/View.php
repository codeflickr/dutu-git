<?php

/*
 * This name is part of the <blah> package.
 *
 * @copyright Copyright &copy; 2009 Example, LLC
 * @link http://www.example.com Example, LLC.
 * @license http://www.example.com/licensing
 */

/**
 * Provides this and that functionality
 *
 * @package     
 * @subpackage  view
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @namesource      View.php
 */
class View implements Viewable {

    /**
     * @var title - the title of the page
     *
     * @access private
     */
    private $title;

    /**
     * @var view - the name of a view resource
     *
     * @access private
     */
    private $view;

    public function __construct() {
        
    }    
    
     /**
     * sets the page title
     *
     * @access public
     * @param $title - the title of the page
     * @return a reference to this Viewable object
     * @author 
     */
    public function setTitle() {
        $this->title = ucfirst($this->view);
        return $this;
    }

    /**
     * retrieves the page title
     *
     * @access public
     * @return string
     * @author 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * sets the name of a view resource
     *
     * @access public
     * @return a reference to this Viewable object
     * @author 
     */
    public function setName($view) {
        $this->view = $view;
        return $this;
    }

    /**
     * sets the content of the view
     *
     * @access public
     * @author 
     */
    public function setContent() {
        require VIEW_PATH . $this->view . '/index.php';
    }
    

}

