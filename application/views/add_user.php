<h1>Create an Account</h1>

<fieldset>
    <legend>Account Information</legend>
    
    <?php
        echo form_open('login/create_member');
        
        echo form_input('acct_fname', set_value('acct_fname', ''), 'placeholder="First Name"');
        echo form_input('acct_lname', set_value('acct_lname', ''), 'placeholder="Last Name"');
        
        echo form_submit('submit', 'Create Account');
        echo '<a href="devcon/index">Home</a>';
    ?>
</fieldset>