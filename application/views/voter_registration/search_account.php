<div id="container_1">Search Account</div>
<div id="container_2">
<div id="container_11">
<?php
	$this->load->helper('form');
	$attributes = array('method' => 'get');
	echo '<div id="container_13">Enter student ID to access account information</div>';
	echo form_open('voter_registration/search_account',$attributes);
	echo '<div id="container_12">'.form_input('account','','required').'</div>';
	echo '<div id="container_13">'.form_submit('search', 'Search Account').'</div>';
	echo form_close();

	if($record_not_found)
	{
		echo '<div class="error_message_1">Record not found</div>';
	}

	if($is_not_numeric)
	{
		echo '<div class="error_message_1">ID number is required</div>';
	}
?>
</div>
</div>