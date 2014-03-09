<div id="container_1">Change Party</div>
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

	<?php
		for($x=0;$x<count($page_view_data);$x++)
		{
			$partylist[$page_view_data[$x]['party_id']] = $page_view_data[$x]['party_name'];
		}
		$partylist['selected'] = 'Select party';
		$partylist_attributes = array( 
									'id' 		=> 'myform',
									'method' 	=> 'post'
								);

		$hidden['ecid'] = $elect_cand_id;
		$id = $elect_cand_id;
		echo '<div>';
		echo form_open('add_party/update_party',$partylist_attributes,$hidden);
		echo form_dropdown('party', $partylist,'selected');
		echo form_hidden('elect_cand_id',$id);
		echo form_submit('mysubmit', 'Change Party');
		echo form_close();

		echo '</div>';
		echo '</div>';
	?>
	
</div>