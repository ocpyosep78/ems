<h1>Voter Statistics</h1>
<div id="body">
<?php
	
	$table = array(	'table'		=>	'<table>',
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
		echo $table['th'].'Program'.$table['th_'];
		echo $table['th'].'Total Voters'.$table['th_'];
	echo $table['tr_'];

	for($x=0; $x<count($page_view_data);$x++)
	{
		echo $table['tr'];
		echo $table['td'].$page_view_data[$x]['prog_name'].$table['td_'];
		echo $table['td'].$page_view_data[$x]['Voter'].$table['td_'];
		echo $table['tr_'];
	}

	echo $table['table_'];
?>
</div>