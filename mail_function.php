<?php	
	function sendOTP($email,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "SMTP port";
		$mail->Username = "SMTP username";
		$mail->Password = "SMTP Password";
		$mail->Host     = "SMTP HOST";
		$mail->Mailer   = "smtp";
		$mail->SetFrom("akashsahay27@gmail.com", "Akash Sahay");
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
				
		$result = $mail->Send();
		if(!$result){
                    echo "Mailer Erroor:" . $mail->ErrorInfo;
                }
               else {
                   return $result;
               }
		return $result;
	}
?>