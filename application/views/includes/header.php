<!DOCTYPE html>
    
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/layout2.css" type="text/css" media="screen" charset="utf-8">
    <script type="text/javascript">
		var seconds = 60
		var minutes = 9
		var NewCount = 0


		function display()
		{
			if(seconds<=0)
			{
				seconds = 60
				minutes -= 1
			}
			if(minutes<=-1)
			{
				minutes = 0
			}
			else
			{
				seconds -=1
				if(minutes==0 && seconds==0)
				{
					document.getElementById("counter").innerHTML = '<meta http-equiv="refresh" content="0;url=logout.php">'
				}
				if(seconds<10)
				{
					document.getElementById("counter").innerHTML = "00:0"+minutes+":0"+seconds
				}
				else
				{
					document.getElementById("counter").innerHTML = "00:0"+minutes+":"+seconds
				}	
				setTimeout("display()",1000) 
			}
		}
	</script>
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
    