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
			$acct_id = $this->session->userdata('acct_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{

				$this->load->model('results_model');
				$results = $this->results_model->get_result();

				$page_view_content["page_view_dir"] = "results/view_results";
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
