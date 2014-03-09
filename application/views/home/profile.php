<div id="container_1">Profile Information</div>
<div id="container_2">

<?php
	if($page_view_data)
	{
		$url = 'http://www3.uic.edu.ph/images/100x102/'.$page_view_data['acct_username'].'.jpg';	
		$account_status = 'INACTIVE';
	
		echo '<div id="container_3">';
		echo '<div id="container_5"><img src="'.$url.'" width=180></div>';
		echo '<div id="container_6">';
		echo '<ul>';

		if($is_registered_voter)
		{
			$account_status = 'ACTIVE';
		}

		echo '<li><a href="'.base_url('index.php/home').'">My Profile</a></li>';
		if(!$is_election_officer)
		{
			echo '<li><a href="'.base_url('index.php/apply_candidacy').'">Apply Candidacy</a></li>';
			if($election_countdown['day'] > 0)
			{
				echo '<li><a href="'.base_url('index.php/ballot').'">Vote Candidates</a></li>';
			}
		}
		else
		{
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
		}
		echo '</ul>';
		echo '</div>';
		echo '</div>';

		$name = $page_view_data['acct_fname'].' '.$page_view_data['acct_mname'].' '.$page_view_data['acct_lname'];

		echo '<div id="container_4">';
		echo '<div id="container_7">Name</div>';
		echo '<div id="container_8"><b>'.$name.'</b></div>';
		echo '<div id="container_7">Course</div>';
		echo '<div id="container_8">'.$page_view_data['course_name'].'</div>';
		echo '<div id="container_7">Program</div>';
		echo '<div id="container_8">'.$page_view_data['prog_name'].'</div>';
		echo '<div id="container_7">Email Address</div>';
		echo '<div id="container_8">'.$page_view_data['email_address'].'</div>';
		echo '<div id="container_7">Student ID </div>';
		echo '<div id="container_8">'.$page_view_data['acct_username'].'</div>';
		echo '<div id="container_7">Date Created</div>';
		echo '<div id="container_8">'.$page_view_data['date_created'].'</div>';
		echo '<div id="container_7">Account Status</div>';
		echo '<div id="container_8">'.$account_status.'</div>';
		echo '<div id="container_7">Election Countdown</div>';
		if($election_countdown['day'] > 0)
		{
		echo '<div id="container_8"><div id="counter"><script>display()</script></div></div>';
		}
		else
		{
			echo '<div id="container_8"><div id="counter">End of Countdown</div></div>';
		}
		echo '</div>';
	}
	else
	{
		echo 'Record not found'; 
	}
?>
</div>