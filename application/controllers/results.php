<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller 
{
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
			$this->load->model('results_model');
			$results = $this->results_model->get_result();

			$page_view_content["page_view_dir"] = "results/view_results";
			$page_view_content["logged_in"] = TRUE;
			$page_view_content["page_view_data"] = $results;
			$this->load->view("includes/template",$page_view_content);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
