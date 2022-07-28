<?php

			require 'PHPMailerAutoload.php';
      include("config.php");

      $email = $_POST['email'];
      $name = $_POST['name'];
      $subject = $_POST['subject'];
      $msg = $_POST['message'];

      $sql1 = "INSERT INTO contact_mail_inbox(email,name,subject,message) VALUES ('$email','$name','$subject','$msg')";
      $x1 = $mysqli->query($sql1);

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'contact@simplesec.in';                 // SMTP username
			$mail->Password = '';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('contact@simplesec.in', 'SimpleSec');
			$mail->addAddress($_POST['email']);     // Add a recipient
			$mail->addAddress('contact@simplesec.in');     // Add a recipient

			$mail->addReplyTo('contact@simplesec.in');
			// print_r($_FILES['file']); exit;
			/*for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) {
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			}*/
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Thank you for Contacting';
			$mail->Body    = 'Dear '.$_POST['name'].',<br><br>Thank you for contacting SimpleSec.<br>We will contact you soon regarding your Query.<br><br><br>Regards,<br>SimpleSec Admin';
			//$mail->AltBody = 'tq';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    //echo 'Message has been sent'
          echo "<script>alert('Mail sent Successfully'); </script>";
          header('Location: contact.php');
			}

	 ?>
