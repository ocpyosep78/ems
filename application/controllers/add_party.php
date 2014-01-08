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
			$page_view_content["page_view_dir"] = "party/add_party";
			$page_view_content["logged_in"] = TRUE;	
			$this->load->view("includes/template",$page_view_content);	
		}
		else
		{
			redirect('/login', 'refresh');
		}	
	}
}
