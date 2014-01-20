<div id="content_header">Candidacy Application Form</div>

<div id="body">


<?php
	echo "Please select options below before filing of candidacy.";


	

	for($x=0;$x<count($page_view_data);$x++)
	{
		$options [$page_view_data[$x]['div_id']] = $page_view_data[$x]['div_name'];
	}

	echo form_open('apply_candidacy/select_position');
	echo form_dropdown('division', $options);
	echo form_submit('mysubmit', 'Submit Option!');

	echo form_close();
?>

</div>