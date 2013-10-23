<?php
    for($x=0;$x<count($result);$x++)
	    {
		$acct_username = "Username: ".$result[$x]->acct_username;
                $acct_password = "Password: ".$result[$x]->acct_password;
                
		
                $this->pdf->AddPage('L',array(88.9,50.8));
                $this->pdf->SetFont('Times','',11);
		$this->pdf->MultiCell(0,5, 'University of Immaculate Conception',0,'C');
		$this->pdf->MultiCell(0,5, 'Commission on Election',0,'C');
                $this->pdf->MultiCell(0,5, $acct_username,0,'C');
                $this->pdf->MultiCell(0,5, $acct_password,0,'C');
                $this->pdf->Output();
	    }
?>