<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Tafadzwa
 */
class login_model extends Model {

    public function init() {
        //TODO put your code here
    }

    public function submit() {

        //clean up the form values
        $stmt = $this->db->prepare("
            SELECT id 
            FROM users 
            WHERE login = :login 
            AND password = MD5(:password)");
        $stmt->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $count = $stmt->rowCount();
        if ($count > 0) {
            //login
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            //show an error!
            header('location: ../login');
        }
        //print_r($data);
    }

}

