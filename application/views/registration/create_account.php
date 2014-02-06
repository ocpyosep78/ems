<div id="content_header">Registration Form</div>
<div id="body">
<div id="registration_form">
<?php
	$this->load->helper('form');

	for($x=0;$x<count($program_list);$x++)
	{
		$options[$program_list[$x]['prog_id']] = $program_list[$x]['prog_name'];
	}
	echo "Please select your program.";
	echo form_open('create_account/profiling');
	echo form_dropdown('program', $options, '');
	echo form_submit('mysubmit', 'Select','class="submit"');
	echo form_close();
?>

</div>
</div>

