<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author Tafadzwa
 */
class Dashboard extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit;
        }
        
        $this->view->js = array('dashboard/js/default.js');
    }
    
    public function index() {
        $this->view->render('dashboard/index');
     }
     
     public function logout() {
         Session::destroy();
         header('location: ../login');
         exit;
     }
     
     public function xhrInsert() {
         $this->model->xhrInsert();
     }
     
     public function xhrGetListings() {
         $this->model->xhrGetListings();
     }
     
      public function xhrDeleteListing() {
         $this->model->xhrDeleteListing();
     }
     
}


