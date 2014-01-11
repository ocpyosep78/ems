<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ballot extends CI_Controller {

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

			$this->load->model('candidate_model');
			$voter_registration = $this->candidate_model->check_voter_registration($acct_id);
			
			if($voter_registration!=NULL)
			{
				$page_view_content["page_view_dir"] = "ballot/ballot_form";			
				$page_view_content["page_view_data"] = $this->candidate_model->get_ssg_candidate_list();
				$page_view_content["position_ssg"] = $this->candidate_model->get_position_list(1);
				$page_view_content["acct_id"] = $acct_id;
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

	public function submit_vote()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->input->post('acct_id');
			$candidate_id = $this->input->post('vote');

			$this->load->model('ballot_model');
			$results = $this->ballot_model->submit_vote($acct_id, $candidate_id);

			$page_view_content["page_view_dir"] = "ballot/successful_vote";
			$page_view_content["logged_in"] = TRUE;
			$this->load->view("includes/template",$page_view_content);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
