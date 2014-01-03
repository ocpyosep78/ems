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

	

	// echo '<pre>';
	// print_r($position_ssg);
	// echo '</pre>';

	// echo '<pre>';
	// print_r($page_view_data);
	// echo '</pre>';

	

	$this->load->helper('form');

	echo form_open('email/send');
	echo $tb['table'];
	echo $tb['tr'];
	echo '<th colspan=3>SSG Executive Position</th>';
	echo $tb['tr_'];

	for($x=0;$x<count($position_ssg);$x++)
	{

		echo $tb['tr'];
		echo '<td colspan=3><b>'.$position_ssg[$x]['pos_name'].'</b></td>';
		echo $tb['tr_'];

		for($y=0;$y<count($page_view_data);$y++)
		{
			if($page_view_data[$y]['pos_id'] == $position_ssg[$x]['pos_id'])
			{
				echo $tb['tr'];
				echo '<td>'.form_radio().$tb['td_'];
				echo '<td>'.'<img src="../css/images/default.jpg" height="75" width="75"'.$tb['td_'];
				echo $tb['td'];
					echo 'Name: <b>'.$page_view_data[$y]['acct_fname']." ".$page_view_data[$y]['acct_lname'].'</b>';
					echo '<br>';
					echo 'Party: '.$page_view_data[$y]['party_name'];
				echo $tb['td_'];
				echo $tb['tr_'];
			}
		}
	}

	echo $tb['tr'];
	echo '<td colspan=3>'.form_button('name','Vote').'</td>';
	echo $tb['tr_'];

	echo $tb['table_'];
	echo form_close()
?>

</div>