<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User extends CI_Controller {
        
        public function register() {
            // if the user is logged in, redirect to the app 
            if($loggedIn = baseCheckLogin()) 
                redirect('app/start');

            $this->load->helper('form');        
            $this->load->library('form_validation');        
            
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]|max_length[40]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[passconf]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');

            if($this->form_validation->run() == false) {
                $body = $this->load->view('user/register_form', '', true);
            } else {
                $formdata = $this->input->post();
                $formdata['password'] = password_hash($formdata['password'], PASSWORD_DEFAULT);

                // process formdata to add it into the table
                $this->load->model('user_model');
                $result = $this->user_model->register($formdata);

                // if registration successful, create a session
                if($result['s']) {
                    $this->load->library('session');
                    $this->session->set_userdata(array('userid'=>$result['d']));
                    redirect("app/start");
                } else {
                    if($result['m'] == 'INSUFFICIENT_DATA')
                        $body = "Data is insufficient.";
                    else if($result['m'] == 'ALREADY_REGISTERED')
                        $body = "Looks like you've already registered.";
                }

                $body .= " Please click <a href=\"".site_url("user/login")."\">here</a> to login.";
            }

            $this->load->view('main', array(
                'title' => 'Register',
                'content' => $body
            )); 
        }



        public function login() {
            // if the user is logged in, redirect to the app 
            if($loggedIn = baseCheckLogin()) 
                redirect('app/start');

            $this->load->helper('form');        
            $this->load->library('form_validation');        
            
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]|max_length[40]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

            if($this->form_validation->run() == false) {
                $body = $this->load->view('user/login_form', '', true);
            } else {
                $formdata = $this->input->post();

                // process formdata to add it into the table
                $this->load->model('user_model');
                $result = $this->user_model->checkUser($formdata);

                // if status is true, then create a session for the user
                if($result['s']) {
                    $this->load->library('session');
                    $this->session->set_userdata(array('userid'=>$result['d']));
                    redirect("app/start");
                } else {
     
                    if($result['m'] == "NO_SUCH_USER")
                        $body = "This email id is not registered with us. Click <a href=\"".site_url('user/register')."\">here</a> to register";
                    else if($result['m'] == "NO_MATCH")
                        $body = "Username and Password don't match!";
                    else                                            
                        $body = "Something went wrong on our server. Please try again after sometime.";

                    $body = "Click <a href=\"".site_url("user/login")."\">here</a> to try again";
                }
            }
            
            $this->load->view('main',  array(
                'title' => 'Login',
                'content' => $body
            )); 
        }

        public function logout() {
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect(base_url());
        }

    }
