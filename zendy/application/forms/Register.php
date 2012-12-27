<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
//        $this->setMethod('post');
//        $this->setAttrib('action','save');
//        $this->addElement('text','email',array(
//            'label'        => 'email',
//            'required'   =>'true',
//            'filter'        => array('StringTrim'),
//            'validator'  =>array('EmailAddress')
//        ));
//        $this->addElement('text','login');
//        $this->addElement('password','password');
//        $this->addElement('submit','save');
        $name = new Zend_Form_Element('name');
        $name->setLabel('name')
                  ->setRequired('true');
        $password = new Zend_Form_Element('password');
        $password->setLabel('password')
                       ->setRequired('true');
        $submit = new Zend_Form_Element('submit');
        $submit->setLabel('submit');
        $email = new Zend_Form_Element('email');
        $email->setLabel('email');
        $this->addElements(array(
            $name,
            $password,
            $email,
            $submit
        ));
        

    }


}

