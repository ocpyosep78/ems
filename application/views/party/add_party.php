<h1>Add Party</h1>
<div id="body">
<?php
	
	$attributes = array( 
							'id' 		=> 'myform',
							'method' 	=> 'post'
					);

	$this->load->helper('url');
	$this->load->helper('form');

	echo form_open('add_party',$attributes);
	echo form_input('party', '', 'placeholder="Party Name"');
	echo form_submit('mysubmit', 'Add');
	echo form_close();
?>
</table>
</div>