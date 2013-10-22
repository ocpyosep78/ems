<?php
    class Login extends CI_Controller
    {
	public function index()
        {
            $data['main_content'] = 'login_form';
	    $this->load->view('includes/template', $data);
	}
	
	public function validate_credentials()
	{
	    $this->load->model('membership_model');
	    $query = $this->membership_model->validate();
	    
	    if($query) // if result is true
	    {
		$data = array(
		    'acct_id' => $this->input->post('acct_id'),
		    'is_logged_in' => TRUE
		);
		$this->session->set_userdata($data);
		redirect('site/members_area');
	    }
	    else
	    {
		$this->index();
	    }
	}
	
	public function signup()
	{
	    $this->load->model('membership_model');
	    $course['course'] = $this->membership_model->select_course();
	    
	    for($x=0;$x<count($course['course']);$x++)
	    {
		$selectedCourse[$course['course'][$x]->course_id] = $course['course'][$x]->course_name;
	    }
	    $course['course'] = $selectedCourse;
	    $this->load->view('includes/header');
	    $this->load->view('signup_form',$course);
	    $this->load->view('includes/footer');
	}
	
	public function view_registered_voter()
	{
	    $this->load->model('membership_model');
	    $registered_voter['registered_voter'] = $this->membership_model->select_registered_voter();
	    
	    //$this->load->view('includes/header');
	    $this->load->view('registered_voter_form', $registered_voter);
	    //$this->load->view('includes/footer');
	}
	
	public function delete_record()
	{
	    $this->load->model('membership_model');
	    $this->membership_model->delete_record();
	    $this->view_registered_voter();
	}
	
	public function activate_acct()
	{
	    $this->load->model('membership_model');
	    $this->membership_model->activate_acct();
	    $this->view_registered_voter();
	}
	
	public function deactivate_acct()
	{
	    $this->load->model('membership_model');
	    $this->membership_model->deactivate_acct();
	    $this->view_registered_voter();
	}
	
	public function confirm_voter_registration()
	{
	    $this->load->model('membership_model');
	    $this->membership_model->confirm_voter_registration();
	    $this->view_registered_voter();
	}
	
	public function create_member()
	{
	    $this->load->library('form_validation');
	    //field name, error message, validation rules
	    
	    $this->form_validation->set_rules('acct_id', 'ID Number', 'trim|required|min_length[4]|is_unique[account.acct_id]');
	    $this->form_validation->set_rules('acct_fname', 'First Name', 'trim|required|required');
	    $this->form_validation->set_rules('acct_mname', 'Middle Name', 'trim|required|required');
	    $this->form_validation->set_rules('acct_lname', 'Last Name', 'trim|required|required');
	    $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
	    
	    
	    //$this->form_validation->set_rules('acct_password', 'Password', 'trimrequired|min_length[4]');
	    //$this->form_validation->set_rules('acct_password2', 'Confirm Password', 'trimrequired|matches[password]');
	    
	    if($this->form_validation->run() == FALSE)
	    {
		$this->signup();
	    }
	    else
	    {
		$this->load->model('membership_model');
		if($query = $this->membership_model->create_member())
		{
		    $this->view_registered_voter();
		    /*$data['main_content'] = 'signup_successful';
		    $this->load->view('includes/template', $data);*/
		}
		else
		{
		    $this->load->view('signup_form');    
		}
	    }
	}
    }
