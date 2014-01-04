<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidacy extends CI_Controller {

	/**
	 * 
	 * Created by Francis Rey Padao
	 * Date 2014/01/03
	 *
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