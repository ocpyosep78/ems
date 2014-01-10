<h1>Add Party</h1>
<div id="body">
	<?php
		
		$pt_id = $party_id;

		$attributes = array( 
							'id' 		=> 'myform',
							'method' 	=> 'post'
							);
		$input_attribute = array(
							'name'			=> 'pt_name',
							'value'			=> $party_name,
							);

		$this->load->helper('url');
		$this->load->helper('form');

		echo "<br />";
		echo form_open('add_party/update_party',$attributes);
		echo form_hidden('pt_id',$pt_id);
		echo form_input($input_attribute);
		echo form_submit('mysubmit', 'Edit');
		echo form_close();
	?>
	
</div>