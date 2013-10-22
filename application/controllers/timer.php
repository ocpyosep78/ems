<?php
    class timer extends CI_Controller
    {
	public function index()
        {
	    $this->load->view('timer_view');
	}
        
        public function set_time()
        {
            $this->load->view('set_time_view');
        }
        
    }
?>