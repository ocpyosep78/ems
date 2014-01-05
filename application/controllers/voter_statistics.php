<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_statistics extends CI_Controller {

	/**
	 * 
	 * Created by Francis Rey Padao
	 * Date 2014/01/01
	 *
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('voter_model');
			$page_view_content["page_view_dir"] = "voter/voter_statistics";
			$page_view_content["page_view_data"] = $this->voter_model->get_voter_statistics();
			$page_view_content["logged_in"] = TRUE;		
			$this->load->view("includes/template",$page_view_content);	
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function registration_form()
	{
		$page_view_content["page_view_dir"] = "registration_form";		
		$this->load->view("includes/template",$page_view_content);	
	}
}
