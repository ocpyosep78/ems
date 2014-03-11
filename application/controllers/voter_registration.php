<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_registration extends CI_Controller 
{
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$student_id = $this->session->userdata('student_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			$this->load->model('timer_model');
			$election_countdown = $this->timer_model->get_election_countdown();

			if($is_election_officer != null)
			{
				$is_commissioner = $this->election_officer_model->check_if_commissioner($acct_id);
				$page_view_content["is_commissioner"] = FALSE;
				if($is_commissioner != null)
				{
					$page_view_content["is_commissioner"] = TRUE;
				}
				
				$page_view_content['record_not_found'] = $this->session->flashdata('record_not_found');
				$page_view_content['is_not_numeric'] = $this->session->flashdata('is_not_numeric');
				$page_view_content["page_view_dir"] = "voter_registration/search_account";
				$page_view_content["is_election_officer"] = TRUE;
				$page_view_content["logged_in"] = TRUE;
				$page_view_content["student_id"] = $student_id;
				$page_view_content["election_countdown"] = $election_countdown;
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

	public function search_account()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$student_id = $this->session->userdata('student_id');
			$page_view_content["is_election_officer"] = FALSE;
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$student_id = $this->input->get('account');

				if($student_id)
				{
					if(is_numeric($student_id))
					{
						$is_commissioner = $this->election_officer_model->check_if_commissioner($acct_id);
						$page_view_content["is_commissioner"] = FALSE;
						if($is_commissioner != null)
						{
							$page_view_content["is_commissioner"] = TRUE;
						}

						$this->load->model('voter_model');
						$this->load->model('candidate_model');
						$account = $this->voter_model->get_account_profile($student_id);
		
						$page_view_content["logged_in"] = TRUE;
						$page_view_content["is_election_officer"] = TRUE;
						$page_view_content["page_view_dir"] = "voter_registration/display_account_details";
						$page_view_content['is_registered_voter'] = FALSE;
						$page_view_content["student_id"] = $student_id;

						if($account)
						{
							$page_view_content['is_registered_voter'] = $this->candidate_model->check_voter_registration($account['acct_id']);
							$page_view_content["page_view_data"] =  $account;
							$this->load->view("includes/template",$page_view_content);
						}
						else
						{
							$this->session->set_flashdata('record_not_found', TRUE);
							redirect('/voter_registration', 'refresh');
						}
					}
					else
					{
						$this->session->set_flashdata('is_not_numeric', TRUE);
						redirect('/voter_registration', 'refresh');
					}
				}
				else
				{
					redirect('/voter_registration','refresh');
				}
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

	public function register_account()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$acct_id = $this->uri->segment(3, 0);
				$this->load->model('voter_model');
				$this->voter_model->add_election_voter($acct_id);
				$account_username = $this->voter_model->get_account_username($acct_id);
				redirect('/voter_registration/search_account?account='.$account_username['acct_username'],'refresh');
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

	public function reset_password()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$acct_id = $this->uri->segment(3, 0);
				$this->load->model('voter_model');
				$this->voter_model->reset_password($acct_id);
				$account_username = $this->voter_model->get_account_username($acct_id);
				redirect('/voter_registration/search_account?account='.$account_username['acct_username'],'refresh');
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

	public function reset_vote()
	{
		if($this->session->userdata('logged_in'))
		{	
			$acct_id = $this->session->userdata('acct_id');
			$this->load->model('election_officer_model');
			$is_election_officer = $this->election_officer_model->check_if_election_officer($acct_id);

			if($is_election_officer != null)
			{
				$acct_id = $this->uri->segment(3, 0);
				$this->load->model('voter_model');
				$this->voter_model->reset_vote($acct_id);
				$account_username = $this->voter_model->get_account_username($acct_id);
				redirect('/voter_registration/search_account?account='.$account_username['acct_username'],'refresh');
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
