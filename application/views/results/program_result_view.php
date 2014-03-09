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

	<table>
		<tr>
			<th>No</th>
			<th>Position</th>
			<th>Program</th>
			<th>Name</th>
			<th>Votes</th>
		</tr>
		<?php
			$applicant_ctr = 0;

			for($x=0;$x<count($page_view_data);$x++)
			{
				$candidate_name = 	$page_view_data[$x]['acct_lname'].", ".
								$page_view_data[$x]['acct_fname']." ".
								$page_view_data[$x]['acct_mname'];

				echo '<tr>';
				echo '<td>'.++$applicant_ctr.'</td>';
				echo '<td>'.$page_view_data[$x]['pos_name'].'</td>';
				echo '<td>'.$page_view_data[$x]['prog_name'].'</td>';
				
				if($page_view_data[$x]['acct_lname'] == NULL)
				{
					echo '<td>No Candidate</td>';
				}
				else
				{
					echo '<td>'.$candidate_name.'</td>';
				}
				echo '<td>'.$page_view_data[$x]['votes'].'</td>';
				echo '</tr>';
			}
		echo '</div>';
		echo '</div>';
		?>
	</table>	
</div>