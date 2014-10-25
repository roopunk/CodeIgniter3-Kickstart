<?php 

    function baseCheckLogin() {
    	$ci =& get_instance();
        $ci->load->library('session');
        if($ci->session->userdata('userid'))
            return true;
        else return false;
    }
