<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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

			/*
			 * This code segment will check if the user is an 
			 * election officer
			 */
			$acct_id = $this->session->userdata('acct_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);
			if($is_election_officer != null)
			{
				$page_view_content["is_election_officer"] = TRUE;
			}
			/*
			 * Election officer checker ends here
			 */

			$this->load->model('candidate_model');
			$voter_registration = $this->candidate_model->check_voter_registration($acct_id);

			if($voter_registration!=NULL)
			{
				$page_view_content["page_view_dir"] = "home/homepage";
			}
			else
			{
				$page_view_content["page_view_dir"] = "error_message/message_1";
			}	
			
			$page_view_content["logged_in"] = TRUE;	
			$this->load->view("includes/template",$page_view_content);	
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}
}
