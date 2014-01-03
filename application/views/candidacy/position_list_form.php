<?php
	
	echo 'Please select desired position.<br>';

	$this->load->helper('form');

	echo form_open('candidacy/select_position');

	for($x=0;$x<count($page_view_data);$x++)
	{
		$position[$x]['name'] = 'position';
		$position[$x]['id'] = 'position';
		$position[$x]['value'] = $page_view_data[$x]['pos_id'];
		$position[$x]['checked'] = 'checked';

		echo form_radio($position[$x]) . $page_view_data[$x]['pos_name'] . '<br>';
	}

	echo form_submit('mysubmit', 'Submit Application');
	echo form_close();
?>

