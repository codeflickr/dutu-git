<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author Tafadzwa
 */
class Error extends AbstractController {
    
    public function init() {
        $this->view->msg = 'Error: No Such Controller Found';
    }
    
    public function other() {
        //TODO
    }
    
}

