<h1>Registered Accounts</h1>

<fieldset>
    <legend>Registered Voters</legend>
    <?php
        
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>ID Number</th>";
        echo "<th>Password</th>";
        echo "<th>First Name</th>";
        echo "<th>Middle Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email Address</th>";
        echo "<th>Course</th>";
        echo "<th>Account Status</th>";
        echo "<th>Registration Status</th>";
        echo "<th>Time and Date Log</th>";
        echo "<th>Account Type</th>";
        echo "<th>Activate Account</th>";
        echo "<th>Delete Account</th>";
        echo "</tr>";
        
        for($x=0;$x<count($registered_voter);$x++)
        {    
            $acct_id = $registered_voter[$x]->acct_id;
            $acct_password = $registered_voter[$x]->acct_password;
            $acct_lName = $registered_voter[$x]->acct_lname;
            $acct_fName = $registered_voter[$x]->acct_fname;
            $acct_mName = $registered_voter[$x]->acct_mname;
            $email_address = $registered_voter[$x]->email_address;
            $course_id = $registered_voter[$x]->course_id;
            $acct_status = $registered_voter[$x]->acct_status;
            $reg_status = $registered_voter[$x]->reg_status;
            $time_date_log = $registered_voter[$x]->time_date_log;
            $acct_type_id = $registered_voter[$x]->acct_type_id;
            
            if($acct_status == 1)
                $status = "Active";
            else
                $status = "Inactive";
            if($reg_status == 1)
                $reg_stat = "Confirmed";
            else
                $reg_stat = "Unconfirmed";
            
            echo "<tr>";
                echo "<td>".$acct_id."</td>";
                echo "<td>".$acct_password."</td>";
                echo "<td>".$acct_fName.   "</td>";
                echo "<td>".$acct_mName.   "</td>";
                echo "<td>".$acct_lName.   "</td>";
                echo "<td>".$email_address."</td>";
                echo "<td>".$course_id.    "</td>";
                echo "<td>".$status.       "</td>";
                if($reg_stat == "Confirmed")
                {
                    echo "<td>".$reg_stat.     "</td>";
                }
                else
                {
                    echo "<td><a href=confirm_voter_registration?id=$acct_id>Confirm</a></td>";
                }
                echo "<td>".$time_date_log."</td>";
                echo "<td>".$acct_type_id."</td>";
                
                if($status == "Inactive")
                {
                    echo "<td><a href=activate_acct?id=$acct_id>Activate</a></td>";
                }
                else
                {
                    echo "<td><a href=deactivate_acct?id=$acct_id>Deactivate</a></td>";
                }
                
                echo "<td><a href=generate_pdf?id=$acct_id>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</fieldset>