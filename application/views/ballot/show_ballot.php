<h1>Voted Candidates</h1>
<div id="body">

	<?php echo "You have voted already!" ?>
	<!-- <table>
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
		?>
	</table>	 -->
</div>