<?php
	
	$this->load->view('includes/header');
	
	echo '<table border=1>';
	echo '<tr>';
		echo '<th>Program Code</th>';
		echo '<th>Program Name</th>';
		echo '<th>Frequency of Voters</th>';
	echo '</tr>';
	for($x=0; $x<count($list);$x++)
	{
		echo '<tr>';
		echo '<td>'.$list[$x]['prog_code'].'</td>';
		echo '<td>'.$list[$x]['prog_name'].'</td>';
		echo '<td>'.$list[$x]['Voter'].'</td>';
		echo '</tr>';
	}
	echo '</table border=1>';

	$this->load->view('includes/footer');
?>