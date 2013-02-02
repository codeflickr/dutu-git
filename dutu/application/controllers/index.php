<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author Tafadzwa
 */
class Index extends AbstractController {

    public function init() {
        $this->view->msg = 'Hello from Index Controller';
    }

    public function other() {
        //TODO
    }

}

