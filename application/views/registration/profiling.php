<div id="content_header">Registration Form</div>
<div id="body">
<div id="registration_form">
<?php
	$this->load->helper('form');

	for($x=0;$x<count($courses);$x++)
	{
		$options[$courses[$x]['course_id']] = $courses[$x]['course_name'];
	}

	$attributes = array(	
						'username'		=>	array(
								              'name'        => 'username',
								              'value'       => set_value('username')
		            						),

						'acct_password'	=>	array(
								              'name'        => 'acct_password',
								              'value'       => set_value('acct_password')
		            						),

						'first_name'	=>	array(
								              'name'        => 'first_name',
								              'value'       => set_value('first_name')
		            						),

						'middle_name'	=>	array(
								              'name'        => 'middle_name',
								              'value'       => set_value('middle_name')
		            						),

						'last_name'		=>	array(
								              'name'        => 'last_name',
								              'value'       => set_value('last_name')
		            						),

						'email_address'	=>	array(
								              'name'        => 'email_address',
								              'value'       => set_value('email_address')
		            						)
					);
	echo '<a href="'.base_url('index.php').'">Go back to login page</a>';
	echo form_open('create_account/register_account');
	echo '<div id="registration_form_label">Select Course</div><div id="registration_form_input">'.form_dropdown('course', $options, '')."</div><br>";

	echo '<div id="registration_form_label">ID Number</div><div id="registration_form_input">'.form_input($attributes['username']).form_error('username')."</div><br>";
	echo '<div id="registration_form_label">Password</div><div id="registration_form_input">'.form_password($attributes['acct_password']).form_error('acct_password')."</div><br>";
    echo '<div id="registration_form_label">First Name</div><div id="registration_form_input">'.form_input($attributes['first_name']).form_error('first_name')."</div><br>";
    echo '<div id="registration_form_label">Middle Name</div><div id="registration_form_input">'.form_input($attributes['middle_name']).form_error('middle_name')."</div><br>";
    echo '<div id="registration_form_label">Last Name</div><div id="registration_form_input">'.form_input($attributes['last_name']).form_error('last_name')."</div><br>";
    echo '<div id="registration_form_label">Email Address</div><div id="registration_form_input">'.form_input($attributes['email_address']).form_error('email_address')."</div><br>";
	
	echo '<div id="registration_form_label"></div><div id="registration_form_input">'.form_submit('submit', 'Create Account').'</div>';
	echo form_close();
?>

</div>
</div>

