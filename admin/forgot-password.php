<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<style type="text/css">
    .error p {
    color:#FF0000;
    font-size:25px;
    font-weight:bold;
    margin:50px;
    text-align: center;
    }
        .error p a {
    color:blue;
    font-size:25px;
    font-weight:bold;
    padding-left: 48%;
    text-align: center;
    }

.error h2 {
   font-size:25px;
    font-weight:bold;
    margin:50px;
    text-align: center;
    }

</style>

<?php
include('config/db.php');
if(isset($_POST["admin_email"]) && (!empty($_POST["admin_email"]))){
$email = $_POST["admin_email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    $error .="<p>Invalid email address please type a valid email address!</p>";
    }else{
    $sel_query = "SELECT * FROM `control_admin` WHERE email='".$email."'";
    $results = mysqli_query($con,$sel_query);
    $row = mysqli_num_rows($results);
    if ($row==""){
        $error .= "<p>No user is registered with this email address!</p>";
        }
    }
    if($error!=""){
    echo "<div class='error'>".$error."
    <br /><a href='javascript:history.go(-1)'>Go Back</a></div>";
        }else{
    $expFormat = mktime(date("H"), date("i")+10, date("s"), date("m")  , date("d"), date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    //$key = md5(2418*2+$email);
    $key = md5($email);
    $addKey = substr(md5(uniqid(rand(),1)),3,10);
    $key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_manager` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://secure.admin.mytutorsbd.com/adminResetPassword.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://secure.admin.mytutorsbd.com/tutorResetPassword.php?key='.$key.'&email='.$email.'&action=reset</a></p>';      
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 10 minute for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';    
$output.='<p>Thanks,</p>';
$output.='<p>Mytutorsbd Team</p>';
$body = $output; 
$subject = "Password Recovery - Myutorsbd";

$email_to = $email;
$fromserver = "noreply@mytutorsbd.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.mytutorsbd.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "noreply@mytutorsbd.com"; // Enter your email here
$mail->Password = "Yyu,NC0o9h8I"; //Enter your passwrod here
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = "noreply@mytutorsbd.com";
$mail->FromName = "Myutorsbd - Password Reset";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to your email with instructions on how to reset your password. Please check your Inbox or Spam folder.</p>
</div><br /><br /><br />";
    }

        }   

}else{
?>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Forgot Password</h2>
			<form method="post" action="" name="reset" >
				<p>Enter your email address to reset your password</p>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" name="admin_email" placeholder="Enter Your Registered Email *" maxlength="50"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							
				<input type="submit" class="btn btn-primary btn-lg btn-block"  value="Reset"/>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password"><a href="login.php" class="btn btn-outline-primary btn-lg btn-block">Sign In</a></div>
					</div>
				</div>
			</form>
		</div>
	</div><?php } ?>	
	<?php include('include/script.php'); ?>
</body>
</html>