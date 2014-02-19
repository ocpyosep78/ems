<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function index()
	{
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'chintinntan1391@gmail.com',
			'smtp_pass' => 'lourence1391',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
			);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('chintinntan1391@gmail.com', 'UIC COMELEC');
		$this->email->to('chintinntan1391@gmail.com');

		$this->email->subject('Forgot Password');
		$this->email->message('Your new password is 123456');

		if($this->email->send())
		{
			echo "email sent";
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}
