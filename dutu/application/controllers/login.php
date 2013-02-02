<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Tafadzwa
 */
class Login extends AbstractController {

    public function init() {

    }

    public function submit() {
        $this->model->submit();
    }
    
}