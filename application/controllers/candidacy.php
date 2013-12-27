<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidacy extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->view('candidacy/candidacy_application_form');
	}

	public function select_position()
	{
		echo 'Please select desired position.<br>';

		$division = $this->input->post('division');
		//echo $division.'<br>';

		$this->load->model('position_model');
		$position['list'] = $this->position_model->get_list_of_position($division);
		
		$this->load->helper('form');
		$this->load->view('candidacy/position_list_form',$position);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */