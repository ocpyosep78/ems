<?php
	$To = "chintinntan1391@gmail.com";
	$Subject = "Reset Password";
	$Message = "temppass";
	$Headers = "From: UIC COMELEC <chintinn_tan13@yahoo.com>";
	$Headers .= 'MIME-Version: 1.0' . "\r\n";
	$Headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	if(mail($To, $Subject, $Message, $Headers))
	{
		echo "Mail sent";
	}
	else
	{
		echo "Mail send failure - message not sent";
	}
?>