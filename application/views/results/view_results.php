<h1>SSG Election Result</h1>
<div id="body">

	<table>
		<tr>
			<th>No</th>
			<th>Position</th>
			<th>Name</th>
			<th>ITE</th>
			<th>ABA</th>
			<th>Educ</th>
			<th>PharmChem</th>
			<th>NDHM</th>
			<th>Music</th>
			<th>LA</th>
			<th>Engr</th>
			<th>Nursing</th>
			<th>MLS</th>
			<th>Total</th>
		</tr>
		<?php
			$applicant_ctr = 0;

			for($x=0;$x<count($page_view_data);$x++)
			{
				$candidate_name = 	$page_view_data[$x]['acct_lname'].", ".
								$page_view_data[$x]['acct_fname']." ".
								$page_view_data[$x]['acct_mname'];
				$total = $page_view_data[$x]['ITE'] + $page_view_data[$x]['ABA'] + $page_view_data[$x]['Educ'] +
						 $page_view_data[$x]['PharmChem'] + $page_view_data[$x]['NDHM'] + $page_view_data[$x]['Music'] +
						 $page_view_data[$x]['LA'] + $page_view_data[$x]['Engr'] + $page_view_data[$x]['Nursing'] +
						 $page_view_data[$x]['MLS'];

				echo '<tr>';
				echo '<td>'.++$applicant_ctr.'</td>';
				echo '<td>'.$page_view_data[$x]['pos_name'].'</td>';
				
				if($page_view_data[$x]['acct_lname'] == NULL)
				{
					echo '<td>No Candidate</td>';
				}
				else
				{
					echo '<td>'.$candidate_name.'</td>';
				}
				echo '<td>'.$page_view_data[$x]['ITE'].'</td>';
				echo '<td>'.$page_view_data[$x]['ABA'].'</td>';
				echo '<td>'.$page_view_data[$x]['Educ'].'</td>';
				echo '<td>'.$page_view_data[$x]['PharmChem'].'</td>';
				echo '<td>'.$page_view_data[$x]['NDHM'].'</td>';
				echo '<td>'.$page_view_data[$x]['Music'].'</td>';
				echo '<td>'.$page_view_data[$x]['LA'].'</td>';
				echo '<td>'.$page_view_data[$x]['Engr'].'</td>';
				echo '<td>'.$page_view_data[$x]['Nursing'].'</td>';
				echo '<td>'.$page_view_data[$x]['MLS'].'</td>';
				echo '<td>'.$total.'</td>';
				echo '</tr>';
			}
		?>
	</table>	
</div>