<div id="content_header">Candidacy Application Form</div>
<div id="body">

<?php
	
	$table = array(		'table'		=>	'<table>',
						'table_'	=>	'</table>',
						'tr'		=>	'<tr>',
						'tr_'		=>	'</tr>',
						'th'		=>	'<th>',
						'th_'		=>	'</th>',
						'td'		=>	'<td>',
						'td_'		=>	'</td>'
					);

	echo $table['table'];

	echo $table['tr'];
	echo $table['td'].'Position Applied '.$table['td_'];
	echo $table['td'].$page_view_data['position'].$table['td_'];
	echo $table['tr_'];

	echo $table['tr'];
	echo $table['td'].'Division '.$table['td_'];
	echo $table['td'].$page_view_data['division'].$table['td_'];
	echo $table['tr_'];

	echo $table['tr'];
	echo $table['td'].'Date of Application '.$table['td_'];
	echo $table['td'].$page_view_data['log'].$table['td_'];
	echo $table['tr_'];

	if($page_view_data['party_name'] == NULL)
	{
		$party = 'Not Available';
	}

	else
	{
		$party = $page_view_data['party_name'];
	}

	echo $table['tr'];
	echo $table['td'].'Party '.$table['td_'];
	echo $table['td'].$party.$table['td_'];
	echo $table['tr_'];

	if($page_view_data['status'] == 0)
	{
		$status = 'Pending';
	}
	elseif ($page_view_data['status'] == 1) 
	{
		$status = 'Approved';
	}
	elseif ($page_view_data['status'] == 2) 
	{
		$status = 'Rejected';
	}
	else
	{
		$status = 'See UIC COMELEC';
	}

	echo $table['tr'];
	echo $table['td'].'Status '.$table['td_'];
	echo $table['td'].$status.$table['td_'];
	echo $table['tr_'];
	

	echo $table['table_'];

	// echo '<br><br><br>';
	echo '<p>Please download the following forms and fill in the required details before <br> 
			submitting to the office of Commission on Elections and Appointments (CEA).</p>';
	echo '<ul>';
	echo '<li><a href="'.base_url().'index.php/download_candidacy_form">Application Letter</a></li>';
	echo '<li><a href="'.base_url().'index.php/download_candidacy_form/download_coc">Certificate of Candidacy</a></li>';
	echo '<li><a href="'.base_url().'index.php/download_candidacy_form/download_osad_cert">OSAD Certification</a></li>';
	echo '<li><a href="'.base_url().'index.php/download_candidacy_form/download_dean_cert">Dean Certification</a></li>';
	echo '</ul>';
?>

</div>
