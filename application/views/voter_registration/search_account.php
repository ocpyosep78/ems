<div id="container_1">Program Election Results</div>
<div id="container_2">
<?php
	
	$url = 'http://www3.uic.edu.ph/images/100x102/'.$student_id.'.jpg';

		echo '<div id="container_3">';
		echo '<div id="container_5"><img src="'.$url.'" width=180></div>';
		echo '<div id="container_6">';
		echo '<ul>';

		echo '<li><a href="'.base_url('index.php/home').'">My Profile</a></li>';
		
		if($election_countdown['day'] > 0)
		{
			echo '<li><a href="'.base_url('index.php/ballot').'">Vote Candidates</a></li>';
			echo '<li><a href="'.base_url().'index.php/results">SSG Election Results</a></li>'; // remove this line when election schedule is activated
			echo '<li><a href="'.base_url().'index.php/program_result">Program Election Results</a></li>'; // remove this line when election schedule is activated
			echo '<li><a href="'.base_url().'index.php/voter_statistics">Voter Statistics</a></li>';
		}
		echo '<li><a href="'.base_url().'index.php/ssg_applicant_list">Applicant List</a></li>'; 
		echo '<li><a href="'.base_url().'index.php/add_party">Add Party</a></li>';
		echo '<li><a href="'.base_url().'index.php/voter_registration">Register Voter</a></li>'; // remove this line when election schedule is activated

		echo '</ul>';
		echo '</div>';
		echo '</div>';

	echo '<div id="container_4">';
	echo '<div id="container_9">';
?>

<div id="container_11">
<?php
	$this->load->helper('form');
	$attributes = array('method' => 'get');
	echo '<div id="container_13">Enter student ID to access account information</div>';
	echo form_open('voter_registration/search_account',$attributes);
	echo '<div id="container_12">'.form_input('account','','required').'</div>';
	echo '<div id="container_13">'.form_submit('search', 'Search Account').'</div>';
	echo form_close();

	if($record_not_found)
	{
		echo '<div class="error_message_1">Record not found</div>';
	}

	if($is_not_numeric)
	{
		echo '<div class="error_message_1">ID number is required</div>';
	}

echo '</div>';
echo '</div>';
?>
</div>
</div>