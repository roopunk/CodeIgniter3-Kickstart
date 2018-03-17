<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
        $data = array(
            'title' => "MySite | Home Page",
            'content' => $this->load->view('pages/home_page', '', true),
            'loggedIn' => baseCheckLogin()
        );
		$this->load->view('main', $data);        
	}

    public function contact() {
        $data = array(
            'title' => "MySite | Home Page",
            'content' => $this->load->view('pages/contact', '', true),
            'loggedIn' => baseCheckLogin()
        );
        $this->load->view('main', $data);
    }

    public function about() {
        $data = array(
            'title' => "MySite | Home Page",
            'content' => $this->load->view('pages/about', '', true),
            'loggedIn' => baseCheckLogin()
        );
        $this->load->view('main', $data);
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
