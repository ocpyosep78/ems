<div id="container_1">Program Election Results</div>
<div id="container_2">
<?php
	
	$url = 'http://www3.uic.edu.ph/images/100x102/'.$student_id.'.jpg';

		echo '<div id="container_3">';
		echo '<div id="container_5"><img src="'.$url.'" width=180></div>';
		echo '<div id="container_6">';
		echo '<ul>';

		echo '<li><a href="'.base_url('index.php/home').'">My Profile</a></li>';
		
		$time_status = $election_countdown['time_status'];
		$cur_time = $election_countdown['cur_time'];
		$end_time = $election_countdown['end_time'];

		if($time_status <= 0 AND $cur_time <= $end_time)
		{
			echo '<li><a href="'.base_url('index.php/ballot').'">Vote Candidates</a></li>';
			
			if($is_election_officer == TRUE)
			{
				if($is_commissioner == FALSE)
				{
					echo '<li><a href="'.base_url().'index.php/results">SSG Election Results</a></li>'; // remove this line when election schedule is activated
					echo '<li><a href="'.base_url().'index.php/program_result">Program Election Results</a></li>'; // remove this line when election schedule is activated
					echo '<li><a href="'.base_url().'index.php/voter_statistics">Voter Statistics</a></li>';
				}
			}
		}
		if($is_election_officer == TRUE)
		{
			if($is_commissioner == FALSE)
			{
				echo '<li><a href="'.base_url().'index.php/ssg_applicant_list">Applicant List</a></li>'; 
				echo '<li><a href="'.base_url().'index.php/add_party">Add Party</a></li>';
				echo '<li><a href="'.base_url().'index.php/add_election">Add Election</a></li>';
				echo '<li><a href="'.base_url().'index.php/add_commissioner">Add Commissioner</a></li>';
			}
			echo '<li><a href="'.base_url().'index.php/voter_registration">Register Voter</a></li>';
		}
		
		echo '</ul>';
		echo '</div>';
		echo '</div>';

	echo '<div id="container_4">';
	echo '<div id="container_9">';
		
	echo "Successfully Voted";

	echo '</div>';
	echo '</div>';
	?>
	
</div>