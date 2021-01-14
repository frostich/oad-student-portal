<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class User_verification extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("session");
			$this->load->library('php_mail');
			$this->load->library('SMTP');
			$this->load->library('exception');
			$this->load->helper("url");
			$this->load->library('email');	
			// $this->load->library('encrypt');
		}

		public function index()
		{
			// $this->test_mail();
            if(!isset($_SESSION['user_verification_code'])) { show_404(); }
			$this->load->view('pages/user_verification_view');
		}

		public function check_vcode()
		{
			if ($_POST['vcode'] == $_SESSION['user_verification_code']) {
				// echo "success";
				$_SESSION['vcode_status'] = true;
				redirect('gr-grade');
			}else{
				$_SESSION['vcode_status'] = false;
				redirect('gr-verification');
			}
		}

		public function resend_vcode()
		{
			$_SESSION['user_verification_code'] = $this->get_random_number();
			$this->send_mail();
		}

		// public function send_verification()
		// {
		// 	$curl = curl_init();
		// 	curl_setopt_array($curl, array(
		// 	  CURLOPT_URL => "https://oad-noreply.000webhostapp.com/send_verification.php?vcode=".$_SESSION['user_verification_code']."&email=".$_SESSION['user_email'] ,
		// 	  CURLOPT_RETURNTRANSFER => true,
		// 	  CURLOPT_ENCODING => "",
		// 	  CURLOPT_MAXREDIRS => 10,
		// 	  CURLOPT_TIMEOUT => 30,
		// 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	  CURLOPT_CUSTOMREQUEST => "POST",
		// 	  CURLOPT_POSTFIELDS => "{}",
		// 	  CURLOPT_HTTPHEADER => array(
		// 	    "Content-Type: application/json"
		// 	  ),
		// 	));
		// 	$response = curl_exec($curl);
		// 	$err = curl_error($curl);
		// 	curl_close($curl);
		// 	if ($err) {
		// 		// echo json_encode("cURL Error #:" . $err);
		// 		$this->session->set_userdata('error_vcode', 1);
		// 	} else {
		// 	  	// echo $response;
		// 		$this->session->set_userdata('error_vcode', 0);
		// 	}
		// }

		public function send_mail()
		{
			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'sg3plcpnl0026.prod.sin3.secureserver.net';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
			    $mail->Username   = 'oad-noreply@oad-student-portal.tk';                     // SMTP username
			    $mail->Password   = '1Q@w3e4r';                               // SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom('oad-noreply@oad-student-portal.tk', 'CLSU Online Grade Viewer');
			    $mail->addAddress($_SESSION['user_email'], $_SESSION['firstname'].' '.$_SESSION['lastname']);     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    $mail->addReplyTo($_SESSION['user_email'], 'Student');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    // Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    // $mail->AddEmbeddedImage('assets/img/oad_header.png', 'logoimg', 'logo.jpg');
			    $mail->Subject = 'Online Grade Viewer Confirmation';
			    $htmlContent	=	'	<h2 style="color: #097a0d;"><small>WELCOME</small> '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'</h2>
										<h3>Here is your verification code. <p style="font-size: 24px; text-decoration: underline;">'.$_SESSION['user_verification_code'].'</p></h3>
									';
			    $mail->Body    = $htmlContent;
			    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    
			    if ($mail->send() == 1) {
			    	// $this->session->set_userdata('error_vcode', 0);
			    	echo json_encode(array("msg" 	=>	'true'));
			    }else{
			    	// $this->session->set_userdata('error_vcode', 1);
			    	echo json_encode(array("msg"	=>	'false'));
			    }
			    
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}

		function get_random_number(){
			$today = date('YmdHi');
			$startDate = date('YmdHi', strtotime('-10 days'));
			$range = $today - $startDate;
			$rand1 = rand(0, $range);
			$rand2 = rand(0, 600000);
			return  $value=($rand1+$rand2);
		 }
	}