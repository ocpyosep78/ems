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

	echo form_open('email/send');
	echo '<table id="ballot">';
	echo $tb['tr'];
	echo '<th colspan=3>SSG Executive Position</th>';
	echo $tb['tr_'];

	for($x=0;$x<count($position_ssg);$x++)
	{
		if($page_view_data == NULL)
		{
			echo $tb['tr'];
			echo '<td id="position_header"><b>'.$position_ssg[$x]['pos_name'].'</b></td>';
			echo $tb['td'].'No Candidate'.$tb['td_'];
			echo $tb['tr_'];
		}
		else
		{
			echo $tb['tr'];
			echo '<td colspan=3 id="position_header"><b>'.$position_ssg[$x]['pos_name'].'</b></td>';
			echo $tb['tr_'];
		
			$candidate_ctr = 0;

			for($y=0;$y<count($page_view_data);$y++)
			{

				if($page_view_data[$y]['pos_id'] == $position_ssg[$x]['pos_id'])
				{	
					$candidate_ctr += 1;
					$candidate = $page_view_data[$y]['acct_fname']." ".$page_view_data[$y]['acct_lname'];
					$party = $page_view_data[$y]['party_name'];

					echo $tb['tr'];
					echo '<td>'.form_radio().$tb['td_'];
					echo '<td>'.'<img src="../css/images/default.jpg" height="75" width="75">'.$tb['td_'];
					echo $tb['td'];
					echo 'Name: <b>'.$candidate.'</b><br>Party: '.$party;
					echo $tb['td_'];
					echo $tb['tr_'];
				}
			}

			if($candidate_ctr == 0)
			{
				echo '<tr><td colspan=3>No Candidate</td></tr>';
			}
		}
	}

	if($page_view_data != NULL)
	{
		echo $tb['tr'];
		echo '<td colspan=3>'.form_button('name','Vote').'</td>';
		echo $tb['tr_'];
	}

	echo $tb['table_'];
	echo form_close()
?>

</div>