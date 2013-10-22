<?php
    class Registration extends CI_Controller
    {
        public function index()
        {
            $this->load->model('registration_model');
	    $course['course'] = $this->registration_model->select_course();
	    
	    for($x=0;$x<count($course['course']);$x++)
	    {
		$selectedCourse[$course['course'][$x]->course_id] = $course['course'][$x]->course_name;
	    }
	    $course['course'] = $selectedCourse;
            
            $this->load->view('includes/header');
	    $this->load->view('registration_form', $course);
	    $this->load->view('includes/footer');
	}
        
        function __construct()
	{
		parent::__construct();
		$this->load->library('pdf'); // Load library
		$this->pdf->fontpath = 'font/'; // Specify font folder
	}
        
        /*------------------------------------------Login-----------------------------------------------------*/
        
        public function login()
        {
            $this->load->view('includes/header');
	    $this->load->view('login_form');
	    $this->load->view('includes/footer');
	}
        
        
        public function validate_credentials()
	{
	    $this->load->model('registration_model');
	    $query = $this->registration_model->validate();
	    
	    if($query) // if result is true
	    {
		$data = array(
		    'acct_username' => $this->input->post('acct_username'),
		    'is_logged_in' => TRUE
		);
		$this->session->set_userdata($data);
		//redirect('site/members_area');
                $this->load->view('includes/header');
                $this->load->view('search_record');
                $this->load->view('includes/footer');
	    }
	    else
	    {
		$this->login();
	    }
	}
        
        /*------------------------------------------Account-Registration-------------------------------------*/
        
        public function sign_up_successful()
	{	    
	    $this->load->view('includes/header');
	    $this->load->view('registration_successful');
	    $this->load->view('includes/footer');
	}
        
        public function create_member()
	{
	    $this->load->library('form_validation');
	    //field name, error message, validation rules
	    
	    $this->form_validation->set_rules('acct_username', 'ID Number', 'trim|required|min_length[4]|is_unique[account.acct_username]');
	    $this->form_validation->set_rules('acct_fname', 'First Name', 'trim|required|required');
	    $this->form_validation->set_rules('acct_mname', 'Middle Name', 'trim|required|required');
	    $this->form_validation->set_rules('acct_lname', 'Last Name', 'trim|required|required');
	    $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
	    
	    if($this->form_validation->run() == FALSE)
	    {
		$this->index();
	    }
	    else
	    {
		$this->load->model('registration_model');
		if($query = $this->registration_model->create_member())
		{
		    $this->sign_up_successful();
		}
		else
		{
		    $this->index();    
		}
	    }
	
        }
        
        /*------------------------------------------Search-Record--------------------------------------------*/
        
        public function search_record()
        {
            $this->load->model('registration_model');
            $record['searched_record'] = $this->registration_model->select_registered_voter();
            
            $this->load->view('includes/header');
	    $this->load->view('search_record', $record);
	    $this->load->view('includes/footer');
        }
        
        /*------------------------------------------Confirm-Account--------------------------------------------*/
        
        public function confirm_voter_registration()
	{
	    $this->load->model('registration_model');
	    $this->registration_model->confirm_voter_registration();
            
	    $this->load->view('includes/header');
            $this->load->view('search_record');
            $this->load->view('includes/footer');
	}
        
        /*------------------------------------------Generate-PDF----------------------------------------------*/
        
        public function generate_pdf()
	{
	    $this->load->model('registration_model');
            $result['result'] = $this->registration_model->print_login_info();
                
            $this->load->view('includes/header');
	    $this->load->view('fpdf', $result);
	    $this->load->view('includes/footer');
	}
        
    }