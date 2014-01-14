<h1>Ballot</h1>
<div id="body">

<?php

	$tb = array(	'table'		=>	'<table>',
					'table_'	=>	'</table>',
					'tr'		=>	'<tr>',
					'tr_'		=>	'</tr>',
					'th'		=>	'<th>',
					'th_'		=>	'</th>',
					'td'		=>	'<td>',
					'td_'		=>	'</td>'
				);

	$this->load->helper('form');

	echo '<table id="ballot">';
	echo $tb['tr'];
	echo '<th colspan=3>SSG Executive Position</th>';
	echo $tb['tr_'];

	for($x=0;$x<count($page_view_data);$x++)
	{
		if($page_view_data[$x]['div_name'] == 'SSG Executive Position')
		{
			echo $tb['tr'];
			echo '<td colspan=3 id="position_header"><b>'.$page_view_data[$x]['pos_name'].'</b></td>';
			echo $tb['tr_'];

			$candidate_name = 	$page_view_data[$x]['acct_lname'].", ".
								$page_view_data[$x]['acct_fname']." ".
								$page_view_data[$x]['acct_mname'];

			echo $tb['tr'];
			echo '<td>'.'<img src="../css/images/default.jpg" height="75" width="75">'.$tb['td_'];
			echo $tb['td'];
			echo 'Name: <b>'.$candidate_name.'</b>';
			echo $tb['td_'];
			echo $tb['tr_'];			
		}
	}

	echo $tb['tr'];
	echo '<th colspan=3>Program Level Position</th>';
	echo $tb['tr_'];

	for($x=0;$x<count($page_view_data);$x++)
	{
		if($page_view_data[$x]['div_name'] == 'Program Level Position')
		{
			echo $tb['tr'];
			echo '<td colspan=3 id="position_header"><b>'.$page_view_data[$x]['pos_name'].'</b></td>';
			echo $tb['tr_'];

			$candidate_name = 	$page_view_data[$x]['acct_lname'].", ".
								$page_view_data[$x]['acct_fname']." ".
								$page_view_data[$x]['acct_mname'];

			echo $tb['tr'];
			echo '<td>'.'<img src="../css/images/default.jpg" height="75" width="75">'.$tb['td_'];
			echo $tb['td'];
			echo 'Name: <b>'.$candidate_name.'</b>';
			echo $tb['td_'];
			echo $tb['tr_'];			
		}
	}
	echo $tb['table_'];
?>

</div>