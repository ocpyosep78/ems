<?php
	
	$timezone = 'Asia/Manila';
	date_default_timezone_set($timezone);		//A PHP function used in overiding default timezone from the PHP.ini 
												//List of PHP supported timezone is found from this link
												//Url: http://www.php.net/manual/en/timezones.php
	$timestamp = time();
    for($x=0;$x<count($result);$x++)
	    {
			$acct_username = "Username: ".$result[$x]->acct_username;
            $acct_password = "Password: ".$result[$x]->acct_password;
			$acct_name = "Name: ".$result[$x]->acct_fName." ".$result[$x]->acct_mName." ".$result[$x]->acct_lName;
			$course = "Course: ".$result[$x]->course_id;
			$dateTime_printed = "Date and Time Printed: ".unix_to_human($timestamp);	

	        $this->pdf->AddPage('L',array(107.95,139.7));
            $this->pdf->SetFont('Times','',14);
			$this->pdf->MultiCell(0,5, 'University of Immaculate Conception',0,'C');
			$this->pdf->MultiCell(0,5, 'Commission on Elections and Appointments',0,'C');$this->pdf->Ln();
			$this->pdf->SetFont('Times','',12);
			$this->pdf->MultiCell(0,5, 'Access Details',0,'C');$this->pdf->Ln();
			$this->pdf->MultiCell(0,5, $acct_name,0,'D');
			$this->pdf->MultiCell(0,5, $course,0,'D');$this->pdf->Ln();
            $this->pdf->MultiCell(0,5, $acct_username,0,'D');
            $this->pdf->MultiCell(0,5, $acct_password,0,'D');
			$this->pdf->Ln();$this->pdf->Ln();$this->pdf->Ln();$this->pdf->Ln();
			$this->pdf->MultiCell(0,5, $dateTime_printed,0,'D');
            $this->pdf->Output();
	    }
?>