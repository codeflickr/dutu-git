<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard_model
 *
 * @author Tafadzwa
 */
class Dashboard_Model extends Model {

    public function init() {
        //TODO put your code here
    }

    public function xhrInsert() {
        
        //sanitize $_POST values here
        $text = $_POST['text'];
        $stmt = $this->db->prepare("
             INSERT INTO data (text)
             VALUES(:text)
           ");
        $stmt->execute(array(
            ':text' => $_POST['text'],
        ));
        echo json_encode($text);
    }

    public function xhrGetListings() {
        $stmt = $this->db->prepare("
            SELECT *
            FROM data
           ");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $data = $stmt->fetchAll();
        echo json_encode($data);
    }
    
    public function xhrDeleteListing() {        
        $id = $_POST['id'];
        $stmt = $this->db->prepare("
            DELETE FROM data 
            WHERE id = :id
           ");
        $stmt->execute(array(':id' => $id));
    }    

}

