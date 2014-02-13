<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_result extends CI_Controller 
{
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$this->load->model('voter_model');
				$this->load->model('results_model');

				$voter_prog_id = $this->voter_model->get_voter_prog_id($acct_id);
				$results = $this->results_model->get_program_result($voter_prog_id[0]['prog_id']);

				$page_view_content["page_view_dir"] = "results/program_result_view";
				$page_view_content["is_election_officer"] = TRUE;
				$page_view_content["logged_in"] = TRUE;
				$page_view_content["page_view_data"] = $results;
				$this->load->view("includes/template",$page_view_content);
			}
			else
			{
				redirect('/home', 'refresh');	
			}	
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
