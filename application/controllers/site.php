<?php
    class Site extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->is_logged_in();
        }
        
        public function members_area()
        {
            $this->load->view('members_area');
        }
        
        public function is_logged_in()
        {
            $is_logged_in = $this->session->userdata('is_logged_in');
            
            if(!isset($is_logged_in) || $is_logged_in != TRUE)
            {
                echo 'You Don\'t Have Permission to Access this Page. <a href="../login">Login</a>';
                die();
            }
        }
    }
?>