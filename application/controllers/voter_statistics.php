<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_statistics extends CI_Controller {

	/**
	 * 
	 * Created by Francis Rey Padao
	 * Date 2013/01/01
	 *
	 */
	public function index()
	{
		$this->load->model('voter_model');

		$page_view_content["page_view_dir"] = "voter/voter_statistics";
		$page_view_content["page_view_data"] = $this->voter_model->get_voter_statistics();

		$this->load->view("includes/template",$page_view_content);
	}

	public function welcome_message()
	{
		$page_view_content["page_view_dir"] = "welcome_message";		
		$this->load->view("includes/template",$page_view_content);
	}
}
