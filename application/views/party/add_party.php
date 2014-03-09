<div id="container_1">Add Party</div>
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
			<th>Party List</th>
			<th>Options</th>
		</tr>
		<?php

			for($x=0;$x<count($page_view_data);$x++)
			{
				$party_id = $page_view_data[$x]['party_id'];
				$party_name = 	$page_view_data[$x]['party_name'];

				echo '<tr>';
				echo '<td>'.$party_name.'</td>';
				echo '<td>';
				echo "<a href=add_party/delete_party/".$party_id.">Delete</a>";
				echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
	
	<?php
	
		$attributes = array( 
							'id' 		=> 'myform',
							'method' 	=> 'post'
							);

		$this->load->helper('url');
		$this->load->helper('form');

		echo "<br />";
		echo form_open('add_party/insert_party',$attributes);
		echo form_input('pt_name', '', 'placeholder="Party Name"');
		echo form_submit('mysubmit', 'Add');
		echo form_close();

		echo '</div>';
		echo '</div>';
	?>
	
</div>