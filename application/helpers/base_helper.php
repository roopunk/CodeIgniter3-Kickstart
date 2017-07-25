<?php 

    function baseCheckLogin() {
    	$ci =& get_instance();
        $ci->load->library('session');
        if($ci->session->userdata('userid'))
            return true;
        else return false;
    }

    function baseGetLoggedinEmail() {
    	$ci =& get_instance();
        $ci->load->library('session');
        if($ci->session->userdata('email'))
            return $ci->session->userdata('email');
        else return "";
    }
