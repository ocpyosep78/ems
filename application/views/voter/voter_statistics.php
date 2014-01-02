<h1>Election Management System</h1>
<div id="body">
<?php
	echo '<table border=1>';
	echo '<tr>';
		//echo '<th>Program Code</th>';
		echo '<th>Program</th>';
		echo '<th>Total Voters</th>';
	echo '</tr>';
	for($x=0; $x<count($page_view_data);$x++)
	{
		echo '<tr>';
		//echo '<td>'.$page_view_data[$x]['prog_code'].'</td>';
		echo '<td>'.$page_view_data[$x]['prog_name'].'</td>';
		echo '<td>'.$page_view_data[$x]['Voter'].'</td>';
		echo '</tr>';
	}
	echo '</table border=1>';
?>
</div>