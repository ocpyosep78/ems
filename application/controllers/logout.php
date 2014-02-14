<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * 
	 * Created by Francis Rey Padao
	 * Date 2014/01/03
	 *
	 */
	public function index()
	{
		// $this->session->set_userdata('user_data', '');
		// echo '<pre>';
		// print_r($this->session->all_userdata());
		// echo '</pre>';
		// $timestamp = $this->session->userdata('last_activity');
		// echo $timestamp;
		// $timezone = 'Asia/Manila';
		// date_default_timezone_set($timezone);
		// echo date('D, d M Y h:i:s O', $timestamp);

        $this->session->sess_destroy();
        redirect(base_url('index.php/login'), 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */