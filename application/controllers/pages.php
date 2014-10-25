<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
        $loggedIn = baseCheckLogin();
        $head = $this->load->view('templates/header', array('loggedIn'=>$loggedIn), true);    
        
        $data = array(
            'title' => "MySite | Home Page",
            'content' => $this->load->view('pages/home_page', '', true),
            'head' => $head
        );
		$this->load->view('main', $data);        
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
