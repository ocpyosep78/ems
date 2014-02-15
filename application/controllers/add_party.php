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
			$acct_id = $this->session->userdata('acct_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$this->load->model('party_model');
				$party = $this->party_model->get_party();

				$page_view_content["page_view_dir"] = "party/add_party";
				$page_view_content["is_election_officer"] = TRUE;
				$page_view_content["logged_in"] = TRUE;
				$page_view_content["page_view_data"] = $party;
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

	public function change_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$elect_cand_id = $this->uri->segment(3, 0);
				$this->load->model('party_model');

				$party = $this->party_model->get_party();
				$page_view_content["page_view_data"] = $party;
				$page_view_content["elect_cand_id"] = $elect_cand_id;
				$page_view_content["page_view_dir"] = "party/change_party";

				$page_view_content["is_election_officer"] = TRUE;
				$page_view_content["logged_in"] = TRUE;	
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

	public function update_party()
	{
		if($this->session->userdata('logged_in'))
		{	
			$elect_cand_id = $this->input->post('elect_cand_id');
			$pt_id = $this->input->post('party');

			if($pt_id)
			{
				$this->load->model('party_model');
				$this->party_model->update_candidate_party($pt_id, $elect_cand_id);
			}
			redirect('/ssg_applicant_list','refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}
