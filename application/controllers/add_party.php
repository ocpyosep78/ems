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

	public function delete_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$pt_id =  $this->uri->segment(3, 0);

			if($pt_id != FALSE)
			{
				$this->load->model('party_model');
				$this->party_model->delete_party($pt_id);
			}
			redirect('/add_party','refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function edit_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$pt_id =  $this->uri->segment(3, 0);
			$pt_name = $this->uri->segment(4, 0);

			$page_view_content["page_view_dir"] = "party/edit_party";


			$page_view_content["logged_in"] = TRUE;
			$page_view_content["party_id"] = $pt_id;
			$page_view_content["party_name"] = $pt_name;
			$this->load->view("includes/template",$page_view_content);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function update_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$pt_id = $this->input->post('pt_id');
			$pt_name = $this->input->post('pt_name');

			if($pt_id != FALSE AND $pt_name != FALSE)
			{
				$this->load->model('party_model');
				$this->party_model->update_party($pt_id, $pt_name);
			}
			redirect('/add_party','refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
