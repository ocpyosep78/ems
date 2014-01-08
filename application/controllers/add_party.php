<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_party extends CI_Controller {

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
			$this->load->model('party_model');
			$party = $this->party_model->get_party();

			$page_view_content["page_view_dir"] = "party/add_party";
			$page_view_content["logged_in"] = TRUE;
			$page_view_content["page_view_data"] = $party;
			$this->load->view("includes/template",$page_view_content);	
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function insert_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$pt_name = $this->input->post('pt_name');

			if($pt_name != FALSE)
			{
				$this->load->model('party_model');
				$this->party_model->add_party($pt_name);
			}
			redirect('/add_party','refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
