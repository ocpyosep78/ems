<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_statistics extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->model('voter_model');
		$voter_statistics['list'] = $this->voter_model->get_voter_statistics();

		$this->load->view('voter/voter_statistics',$voter_statistics);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */