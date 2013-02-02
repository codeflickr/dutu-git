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
 * @subpackage  controller
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      AbstractController.php
 */
abstract class AbstractController {

    /**
     * @var view - a viewable object
     *
     * @access private
     */
    protected $view;

    /**
     * @var session - a session object
     *
     * @access protected
     */
    protected $session;

    /**
     * @var model - a model object
     *
     * @access protected
     */
    protected $model;
    
    /**
     * @var form - a form object
     *
     * @access protected
     */
    protected $form;
  
    /**
     *
     * @access public
     * @param dutu - a Dependency Injection (DI) container object
     * @param model - a model name of the controller in this context
     * @author 
     */
    function __construct(Dutu $dutu, $model) {
        $this->view = $dutu->view;        
        $this->model = $dutu->$model;
        $this->session = $dutu->session;

        //invoke the init method of the controller in context
        $this->init();
    }

    /**
     * performs specific controller initialization
     *
     * @access public
     * @author 
     */
    public function init() {
        //TODO override this method in your controller and perform initialization
    }

    /**
     * renders the view 
     *
     * @access public
     * @param view - the name of a view resource
     * @author 
     */
    public function index($view) {
        $this->view
                ->setName($view)
                ->setTitle()
                ->setContent();
    }
    

}

