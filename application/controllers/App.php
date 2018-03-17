<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App extends CI_Controller {

    public function index() {
        redirect(site_url("app/start"));
    }

    public function start() {
        $loggedIn = baseCheckLogin();
        if (!$loggedIn) {
            $content = 'Not logged in . Click <a href="' . site_url('user/login') . '">here</a> to login.';
        } else {
            $userid = $this->session->userdata('userid');
            $content = $this->load->view("app/start", array('email' => baseGetLoggedinEmail()), true);
        }
        $data = array(
            'title' => 'App | Start',
            'app' => true,
            'content' => $content
        );
        $this->load->view('main', $data);
    }

}

