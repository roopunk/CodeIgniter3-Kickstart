<?php

    class User_model extends CI_Model {
        
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function register($formdata) {
            $email = (isset($formdata['email']))?$formdata['email']:false;
            $pass  = (isset($formdata['password']))?$formdata['password']:false;
            if(!$email or !$pass) return array('s' => false, 'm'=> "INSUFFICIENT_DATA");
            
            // check if this email id is already registered
            $result = $this->db->query("SELECT `email` FROM user WHERE `email` = ?", array($email));
            $rows = $result->num_rows();
            if($rows!=0)
                return array('s' => false, 'm'=> "ALREADY_REGISTERED");
        
            $this->db->query("INSERT INTO user (`email`, `password`) VALUES ( ?, ? )", array($email, $pass));
            $insert_id = $this->db->insert_id();
            return array('s'=>true, 'm'=> "SUCCESSFUL", 'd' => $insert_id);
        }

        function checkUser($formdata) {
            $email = (isset($formdata['email']))?$formdata['email']:false;
            $pass  = (isset($formdata['password']))?$formdata['password']:false;
            if(!$email or !$pass) return array('s' => false, 'm'=> "INSUFFICIENT_DATA");
            
            // check if this email id is registered
            $result = $this->db->query("SELECT `email` FROM user WHERE `email` = ?", array($email));
            $rows = $result->num_rows();
            if($rows==0)
                return array('s' => false, 'm'=> "NO_SUCH_USER");

            // check if this email and password match
            $result = $this->db->query("SELECT `id`,`email` FROM user WHERE `email` = ? and `password` = ? ", array($email, $pass));
            $rows = $result->num_rows();
            if($rows==0)
                return array('s' => false, 'm'=> "NO_MATCH");
            $id = $result->row()->id;

            return array('s'=>true, 'm'=>'SUCCESSFUL', 'd'=>$id);
        }
    }
