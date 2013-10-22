<div id="login_form">
  <h1>Login</h1>
  
  <?php
    echo form_open('login/validate_credentials');
    echo form_input('acct_id', '', 'placeholder="ID Number"');
    echo form_password('acct_password', '', 'placeholder="Password"');
    echo form_submit('submit', 'Login');
    echo anchor('login/signup', 'Create Account');
  ?>
</div>
