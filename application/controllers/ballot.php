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
			$course = $this->session->userdata('course_id');

			$this->load->model('candidate_model');
			$voter_registration = $this->candidate_model->check_voter_registration($acct_id);

			$this->load->model('voter_model');
			$voter_id = $this->voter_model->get_election_voter_id($acct_id);
			$check_voter = $this->voter_model->check_voter_if_voted($voter_id[0]['elect_voter_id']);
			
			
			if($voter_registration!=NULL)
			{
				if($check_voter)
				{	
					for($i=0;$i<count($check_voter);$i++)
					{
						if($check_voter[$i]['elect_voter_id'] == $voter_id[0]['elect_voter_id'])
						{
							$page_view_content["page_view_dir"] = "ballot/show_ballot";
							$page_view_content["page_view_data"] = $this->voter_model->get_voted_candidates_by_voter($voter_id[0]['elect_voter_id']);
						}
					}
				}
				else
				{
					$page_view_content["page_view_dir"] = "ballot/ballot_form";			
					$page_view_content["page_view_data"] = $this->candidate_model->get_ssg_candidate_list();
					$page_view_content["program_candidates"] = $this->candidate_model->get_program_candidate_list($course);
					$page_view_content["position_ssg"] = $this->candidate_model->get_position_list(1);
					$page_view_content["position_program"] = $this->candidate_model->get_position_list(2);
				}
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
			$acct_id = $this->session->userdata('acct_id');

			$this->load->model('voter_model');
			$voter_prog_id = $this->voter_model->get_voter_prog_id($acct_id);
			$voter_id = $this->voter_model->get_election_voter_id($acct_id); 

			$this->load->model('candidate_model');
			$position_id = $this->candidate_model->get_position_list(1);


			for($x=0;$x<count($position_id);$x++)
			{
				$pos_id = $position_id[$x]['pos_id'];
				$elect_cand_id = $this->input->post($pos_id);

				if($elect_cand_id)
				{
					$this->load->model('ballot_model');
					$this->ballot_model->insert_vote($elect_cand_id, $voter_id[0]['elect_voter_id'], $voter_prog_id[0]['prog_id']);
				}
			}

			$position_id = $this->candidate_model->get_position_list(2);
			for($x=0;$x<count($position_id);$x++)
			{
				$pos_id = $position_id[$x]['pos_id'];
				$elect_cand_id = $this->input->post($pos_id);

				if($elect_cand_id)
				{
					$this->load->model('ballot_model');
					$this->ballot_model->insert_vote($elect_cand_id, $voter_id[0]['elect_voter_id'], $voter_prog_id[0]['prog_id']);
				}
			}

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
