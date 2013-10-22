<?php
    for($x=0;$x<count($result);$x++)
	    {
		$acct_username = "Username: ".$result[$x]->acct_username;
                $acct_password = "Password: ".$result[$x]->acct_password;
                
                $this->pdf->AddPage();
                $this->pdf->SetFont('Arial','B',12);
                $this->pdf->MultiCell(50,5, $acct_username);
                $this->pdf->MultiCell(50,5, $acct_password);
                $this->pdf->Output();
	    }
?>