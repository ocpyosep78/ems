<?php 
	
	/**
	* Template page view
	* Created by Francis Rey Padao
	* Date 2014/01/01
	*
	* Binds the header and footer views into a single 
	* page view
	*/
	$this->load->view('includes/header');

	if(!isset($page_view_data))
	{
		$page_view_data = NULL;
	}

	if($logged_in)
	{
		$this->load->view('includes/left_nav');		
	}

	$this->load->view($page_view_dir, $page_view_data);	
	$this->load->view('includes/footer'); 

?>
