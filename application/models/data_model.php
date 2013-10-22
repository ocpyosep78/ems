<?php
    
    class data_model extends CI_Model
    {
        
        public function timer_data()
        {
            $sQuery = $this->db->query("SELECT YEAR(due_date) FROM tbl_timer");
            if($sQuery->num_rows() > 0)
            {
                foreach($sQuery->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }
        
        public function login()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $SQLstring = "SELECT * FROM tbl_account WHERE username = '$username' and password = '$password'";
                
                $sQuery = mysql_query($SQLstring);
                $count= mysql_num_rows($sQuery);
                if($count==1)
                {
                 header("location:next.php");
                }
            }
        }
    }
    
?>