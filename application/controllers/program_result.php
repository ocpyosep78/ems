<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_result extends CI_Controller 
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
			$acct_id = $this->session->userdata('acct_id');

			$this->load->model('voter_model');
			$voter_prog_id = $this->voter_model->get_voter_prog_id($acct_id);

			$this->load->model('results_model');
			$results = $this->results_model->get_program_result($voter_prog_id[0]['prog_id']);

			$page_view_content["page_view_dir"] = "results/program_result_view";
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
