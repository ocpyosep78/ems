<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_candidacy extends CI_Controller {

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
			$candidacy = $this->candidate_model->check_candidacy_application($acct_id);

			if($candidacy!=NULL)
			{
				$page_view_content["page_view_data"] = 	$candidacy;
				$page_view_content["page_view_dir"] = "candidacy/candidacy_application_table";
			}
			else{
				$voter_registration = $this->candidate_model->check_voter_registration($acct_id);
				
				if($voter_registration!=NULL)
				{
					$this->load->model('position_model');
					$page_view_content["page_view_data"] = $this->position_model->get_division();
					$page_view_content["page_view_dir"] = "candidacy/candidacy_application_form";
				}
				else
				{
					$page_view_content["page_view_dir"] = "error_message/message_1";
				}
			}

			$page_view_content["logged_in"] = TRUE;	
			$this->load->view("includes/template",$page_view_content);		
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}

	public function select_position()
	{

		if($this->session->userdata('logged_in'))
		{	
			$division = $this->input->post('division');
			
			$this->load->model('position_model');

			$page_view_content["page_view_dir"] = "candidacy/position_list_form";
			$page_view_content["logged_in"] = TRUE;	
			$page_view_content["page_view_data"] = $this->position_model->get_list_of_position($division);

			$this->load->view("includes/template",$page_view_content);		
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}
}