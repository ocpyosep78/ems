<h1>Create an Account</h1>

<div id="login">
    <a href="registration/login">Login</a>
</div>

<fieldset>
    
    <legend>Account Information</legend>
    
    <?php
        echo form_open('registration/create_member');
        
        echo form_dropdown('course_id', $course, '');
        echo "<br /><br />";
        echo form_input('acct_username', set_value('acct_username', ''), 'placeholder="ID Number"');
        echo form_input('acct_fname', set_value('acct_fname', ''), 'placeholder="First Name"');
        echo form_input('acct_mname', set_value('acct_mname', ''), 'placeholder="Middle Name"');
        echo form_input('acct_lname', set_value('acct_lname', ''), 'placeholder="Last Name"');
        echo form_input('email_address', set_value('email_address', ''), 'placeholder="Email Address"');
        
        echo form_submit('submit', 'Create Account');
        
        echo validation_errors('<p class="error">');
    ?>
</fieldset>
    