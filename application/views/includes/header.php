<!DOCTYPE html>
    
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/layout2.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div id="main_container">
	<div id="header">
		<div id="banner">
			<div id="banner_content">ELECTION DASHBOARD</div>
			<div id="banner_description">Commission on Elections and Appointments, University of the Immaculate Conception</div>
		</div>
		
		<div id="login_form_container">  
		<?php
			if($logged_in)
			{
				$fname = $this->session->userdata('acct_fname');
				$lname = $this->session->userdata('acct_lname');
				echo $fname." ".$lname;
				echo " ".'[<a href="'.base_url().'index.php/logout">Logout</a>]';
			}
			else
			{
				// $this->load->view('login_form');	
			}
		?>
		</div>
	</div>
    