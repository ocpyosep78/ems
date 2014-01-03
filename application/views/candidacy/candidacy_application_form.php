<?php
	echo "<h2>Candidacy Application Form</h2>";
	echo "Please select options below before filing of candidacy.";

	echo form_open('apply_candidacy/select_position');
	
	$options = array('SSG Executive Position',
                  	 'Program Representative',
                  	 'Program Level Position'
                );


	echo form_dropdown('division', $options);
	echo form_submit('mysubmit', 'Submit Option!');

	echo form_close();
?>