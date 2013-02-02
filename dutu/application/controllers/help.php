<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Help
 *
 * @author Tafadzwa
 */
class Help extends AbstractController {

    public function init() {
        $this->view->form = new Form();
        $this->view->form->setName("ExampleForm")
                ->setAction('help/other')
                ->addField(new FormInput("", "text", "firstname", "First name"))
                ->addField(new FormSeparator())
                ->addField(new FormInput("", "text", "lastname", "Last name"))
                ->addField(new FormSeparator())
                ->addField(new FormInput("Submit", "submit", "submit"));
    }

    public function other() {
        echo 'This is the other method';
    }

}

