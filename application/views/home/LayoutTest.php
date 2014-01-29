<div id="content_header">Welcome <?php echo $page_view_data[0]['acct_fname'];?>!</div>

<div id="body">
	<?php
		$acct_username = $page_view_data[0]['acct_username'];
		$acct_name = $page_view_data[0]['acct_fname']." ".
				     $page_view_data[0]['acct_mname']." ".
				     $page_view_data[0]['acct_lname'];

		echo '<table border=0>';

			echo '<tr>';
				echo '<td rowspan=4><img src="http://www3.uic.edu.ph/images/100x102/'.$acct_username.'.jpg"></td>';
				echo '<td>ID Number: </td>';
				echo '<td>'.$page_view_data[0]['acct_username'].'</td>';
			echo '</tr>';
			echo '<tr>';
				// echo '<td><a href="'.base_url().'index.php/apply_candidacy">Apply for Candidacy</a></td>';
				echo '<td>Name: </td>';
				echo '<td>'.$acct_name.'</td>';
			echo '</tr>';
			echo '<tr>';
				// echo '<td><a href="'.base_url().'index.php/ballot">Ballot</a></td>';
				echo '<td>Course: </td>';
				echo '<td>Bachelor of Science in Information Technology</td>';
			echo '</tr>';
			echo '<tr>';
				// echo '<td><a href="'.base_url().'index.php/ssg_applicant_list">Applicant List</a></td>';
				echo '<td>Email Address: </td>';
				echo '<td>'.$page_view_data[0]['email_address'].'</td>';
			echo '</tr>';
			echo '</tr>';
			echo '<tr>';
			echo '<td><a href="'.base_url().'index.php/apply_candidacy">Apply for Candidacy</a></td>';
			echo '</tr>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/ballot">Ballot</a></td>';
			echo '</tr>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/ssg_applicant_list">Applicant List</a></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/add_party">Add Party</a></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/program_result">Program Election Results</a></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/results">SSG Election Results</a></td>';
			echo '</tr>';

		echo '</table>';
	?>
</div>