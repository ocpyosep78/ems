<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
			redirect('/home', 'refresh');
		}
		else
		{
			$page_view_content["page_view_dir"] = "welcome_message";
			$page_view_content["logged_in"] = FALSE;
			$this->load->view("includes/template",$page_view_content);
		}		
	}

	public function check_login_details()
	{
		$username = $this->input->post('username');
		$userpass = $this->input->post('password');

		if($username AND $userpass)
		{
			$this->load->model('voter_model');
			$list = $this->voter_model->check_voter_login($username, $userpass);		
			
			if($list != null)
			{

				$newdata = array(
							   'acct_id'	=> $list['acct_id'],
							   'acct_lname'	=> $list['acct_lname'],
							   'acct_fname'	=> $list['acct_fname'],
							   'course_id'	=> $list['course_id'],
							   'logged_in'	=>	TRUE
				               );

				$this->session->set_userdata($newdata);
				redirect('/home', 'refresh');
			}
			else
			{
				redirect('/login', 'refresh');
			}
		}
		else
		{
			redirect('/login', 'refresh');	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */