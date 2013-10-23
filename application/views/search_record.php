<h1>Search Student</h1>

<fieldset>
    <?php
        echo form_open('registration/search_record');    
        
        echo form_input('searched_record', set_value('', ''), 'placeholder="Enter ID Number"');
        echo form_submit('submit', 'Search');
        echo "<a href='login'>Logout</a>";
    ?>
</fieldset>

<fieldset>
<div id="record_id">
<?php
    if(isset($_SESSION['message']))
    {
        if($_SESSION['message'] == 1)
        {
            for($x=0;$x<count($searched_record);$x++)
            {
                $acct_id = $searched_record[$x]->acct_id;
                $acct_username = $searched_record[$x]->acct_username;
                $acct_lName = $searched_record[$x]->acct_lname;
                $acct_fName = $searched_record[$x]->acct_fname;
                $acct_mName = $searched_record[$x]->acct_mname;
                $email_address = $searched_record[$x]->email_address;
                $course = $searched_record[$x]->course_id;
                $acct_status = $searched_record[$x]->acct_status;
                $reg_status = $searched_record[$x]->reg_status;
                $time_date_log = $searched_record[$x]->time_date_log;
                $acct_type_id = $searched_record[$x]->acct_type_id;
                
                if($acct_status == 1)
                    $status = "Active";
                else
                    $status = "Inactive";
                if($reg_status == 1)
                    $reg_stat = "Confirmed";
                else
                    $reg_stat = "Unconfirmed";
                
                    echo "Username: ".$acct_username."<br />";
                    echo "Name: ".$acct_fName." ".$acct_mName." ".$acct_lName."<br />";
                    echo "Email: ".$email_address.   "<br />";
                    echo "Course: ".$course.         "<br />";
                    if($reg_stat == "Confirmed")
                    {
                        echo "Registration Status: ".$reg_stat. "<br />";
                    }
                    else
                    {
                        echo "Account Status: <a href=confirm_voter_registration?id=$acct_id>Confirm</a><br />";
                    }
                    echo "Time and Date Logged: ".$time_date_log."<br />";
                    echo "Account Type: ".        $acct_type_id. "<br />";
                    echo "<a href=generate_pdf?id=$acct_id>Print Username and Password</a><br />";
            }
            echo "<meta http-equiv='refresh' content='10' >";
            unset($_SESSION['message']);
        }
    }else
    {
        echo "No Record Found";
    }
    
?>
</div>
</fieldset>