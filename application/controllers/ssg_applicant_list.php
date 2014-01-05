<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ssg_applicant_list extends CI_Controller {

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
			$application_status = $this->input->post('applicant_status');
			$this->load->model('chairman_model');

			if($application_status != NULL AND $application_status != 3 AND $application_status != 4)
			{
				$ssg_applicants = $this->chairman_model->get_ssg_applicants_by_status($application_status);	
				$page_view_content["page_view_data"] = $ssg_applicants;
				$page_view_content["page_view_dir"] = "candidates/list_of_approved_ssg_applicants";
			}
			else
			{
				$ssg_applicants = $this->chairman_model->get_ssg_applicants();
				$page_view_content["page_view_data"] = $ssg_applicants;
				$page_view_content["page_view_dir"] = "candidates/list_of_ssg_applicants";
			}

			$page_view_content["logged_in"] = TRUE;	
			$this->load->view("includes/template",$page_view_content);		
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}

	public function update_status()
	{
		if($this->session->userdata('logged_in'))
		{	
			$candidate_id = $this->uri->segment(3, 0);
			$status = $this->uri->segment(4, 0);

			$this->load->model('chairman_model');
			$ssg_applicants = $this->chairman_model->update_ssg_applicant_status($candidate_id,$status);

			redirect('/ssg_applicant_list', 'refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	} 

	public function display_approved_candidates()
	{
		if($this->session->userdata('logged_in'))
		{	
			
			$this->load->model('chairman_model');
			$ssg_applicants = $this->chairman_model->get_ssg_applicants_by_status(1);
			
			$page_view_content["page_view_data"] = $ssg_applicants;
			$page_view_content["page_view_dir"] = "candidates/list_of_approved_ssg_applicants";
			$page_view_content["logged_in"] = TRUE;	

			$this->load->view("includes/template",$page_view_content);		
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}
}
