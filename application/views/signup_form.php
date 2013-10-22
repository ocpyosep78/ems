<h1>Create an Account</h1>

<fieldset>
    <legend>Account Information</legend>
    
    <?php
        echo form_open('login/create_member');
        
        echo form_dropdown('course_id', $course, '');
        echo "<br /><br />";
        echo form_input('acct_id', set_value('acct_id', ''), 'placeholder="ID Number"');
        echo form_input('acct_fname', set_value('acct_fname', ''), 'placeholder="First Name"');
        echo form_input('acct_mname', set_value('acct_mname', ''), 'placeholder="Middle Name"');
        echo form_input('acct_lname', set_value('acct_lname', ''), 'placeholder="Last Name"');
        echo form_input('email_address', set_value('email_address', ''), 'placeholder="Email Address"');
        
        echo form_submit('submit', 'Create Account');
        echo '<a href="login/index">Login</a>';
        
        echo validation_errors('<p class="error">');
    ?>
</fieldset>
    