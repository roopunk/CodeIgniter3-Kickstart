<?php

    class User_model extends CI_Model {
        
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function register($formdata) {
            $email = $formdata['email'];
            $pass = $formdata['password'];
            if(empty($email) || empty($pass)) 
                return array('s' => false, 'm'=> "INSUFFICIENT_DATA");
            
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
            $email = $formdata['email'];
            $pass  = $formdata['password'];

            if(empty($email) || empty($pass)) 
                return array('s' => false, 'm'=> "INSUFFICIENT_DATA");
            
            // check if this email id is registered
            $result = $this->db->query("SELECT `id`, `email`, `password` FROM user WHERE `email` = ?", array($email));
            $rows = $result->num_rows();
            if($rows==0) {
                return array('s' => false, 'm'=> "NO_SUCH_USER");
            } else {
                $row = $result->row_array();
                $password = $row['password'];

                // checking password
                if (!password_verify($pass, $password)) {
                    return array('s' => false, 'm'=> "NO_MATCH");
                }

                $id = $row['id'];
            }

            return array('s'=>true, 'm'=>'SUCCESSFUL', 'd'=>$id);
        }
    }
