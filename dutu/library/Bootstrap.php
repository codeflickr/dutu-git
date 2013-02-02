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
 * @subpackage  library
 *
 * @author      Tafadzwa Gonera <tafadzwagonera@gmail.com>
 * @version     
 * @since       v1.0.6
 *
 * @filesource      Bootstrap.php
 */
class Bootstrap {

    /**
     * @var url - a URL
     *
     * @access private
     */
    private $url;

    /**
     * @var controller - a controller object
     *
     * @access private
     */
    private $controller;

    /**
     * @var dutu - a Dependency Injection (DI) container object
     *
     * @access private
     */
    private $dutu;

    /**
     * @var model - model name
     *
     * @access private
     */
    private $model;

    /**
     * loads the model of the delegated controller
     *
     * @access private
     * @param model - a model name of the controller in this context
     * @author 
     */
    private function loadModel($model) {
        $this->model = $model;
        $file = MODEL_PATH . $this->model . '_model.php';

        //does the .php file of the model exist
        if (file_exists($file)) {
            require $file;
        } else {

            //create the default model, Index_Model 
            $this->model = 'index';
            require MODEL_PATH . $this->model . '_model.php';
        }
        $classId = $this->model . '_model';
        $value = ucfirst($this->model . '_Model');

        //create a dutu property and map its class id to a class name
        $this->dutu->$classId = $value;

        //create a callback function which creates a model object
        $this->dutu->{$this->model} = function($container) use($classId) {

                    //create and return a model object associated with the class id
                    return new $container->$classId();
                };
    }

    /**
     *
     * @access public
     * @param dutu - a Dependency Injection (DI) container object
     * @author 
     */
    function __construct(Dutu $dutu) {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->url = rtrim($this->url, '/');
        $this->url = explode('/', $this->url);
        //a set of URL possibilities after performing explode:
        //1. url[0] => '' 
        //2. url[0] => 'controller'
        //3. url[0] => 'controller', url[1] => 'method'
        //4. url[0] => 'controller', url[1] => 'method', url[2] => 'arg'
        //create a Dependency Injection (DI) container object
        $this->dutu = $dutu;
    }

    /**
     * loads a controller associated with a URL
     *
     * @access public
     * @author 
     */
    public function loadController() {
        if (empty($this->url[0])) {

            //dispatch the request to the default controller, Index                               
            $this->url[0] = 'index';
            $file = CONTROLLER_PATH . $this->url[0] . '.php';
            require $file;
        } else {
            $file = CONTROLLER_PATH . $this->url[0] . '.php';

            //does the .php file of the controller exist
            if (file_exists($file)) {
                require $file;
            } else {

                //dispatch the request to the Error controller
                $this->url[0] = 'error';
                $file = CONTROLLER_PATH . $this->url[0] . '.php';
                require $file;
            }
        }
        $this->dutu->registerComponents();
        $this->loadModel($this->url[0]);

        //create an object of the delegated controller           
        $this->controller = new $this->url[0]($this->dutu, $this->model);
    }

    /**
     * calls a method defined in the delegated controller
     *
     * @access public
     * @author 
     */
    public function callMethod() {

        //is URL of type: http://webapp/controller/method/arg  
        if (isset($this->url[2])) {
            if (method_exists($this->controller, $this->url[1])) {

                //invoke method(arg)
                $this->controller->{$this->url[1]}($this->url[2]);
            } else {

                //throw an exception if such method does not exist
                throw new Exception('No Such Method Found');
            }
        } else {

            //is URL of type: http://webapp/controller/method
            if (isset($this->url[1])) {
                if (method_exists($this->controller, $this->url[1])) {

                    //invoke method()
                    $this->controller->{$this->url[1]}();
                } else {

                    //throw an exception if such method does not exist
                    throw new Exception('No Such Method Found');
                }
            } else {

                //URL is of type http://webapp/controller 
                //invoke index(view)
                $this->controller->index($this->url[0]);
            }
        }
    }

}

