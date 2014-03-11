<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller 
{

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$student_id = $this->session->userdata('student_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			$this->load->model('timer_model');
			$election_countdown = $this->timer_model->get_election_countdown();

			if($is_election_officer != null)
			{
				$is_commissioner = $this->election_officer_model->check_if_commissioner($acct_id);
				$page_view_content["is_commissioner"] = FALSE;
				if($is_commissioner != null)
				{
					$page_view_content["is_commissioner"] = TRUE;
				}

				$this->load->model('results_model');
				$results = $this->results_model->get_result();

				$page_view_content["page_view_dir"] = "results/view_results";
				$page_view_content["is_election_officer"] = TRUE;
				$page_view_content["logged_in"] = TRUE;
				$page_view_content["student_id"] = $student_id;
				$page_view_content["page_view_data"] = $results;
				$page_view_content["election_countdown"] = $election_countdown;
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
