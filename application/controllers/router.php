<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router extends CI_Controller {

	/**
	 * 
	 * Created by Francis Rey Padao
	 * Date 2014/01/03
	 *
	 */
	
	public function index()
	{

		
		if($this->session->userdata('logged_in'))
		{
			redirect('/home', 'refresh');
		}
		else
		{
			redirect('/login', 'refresh');	
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */