<?php include('include/header.php');?>
<head>
	<link rel="stylesheet" href="css/regpage.css">
</head>
<style type="text/css">
    .error p {
    color:#FF0000;
    font-size:25px;
    font-weight:bold;
    margin:50px;
    text-align: center;
    }
        .error a {
    color:blue;
    font-size:25px;
    font-weight:bold;
    padding-left: 48%;
    text-align: center;
    }

</style>


<?php
include('config/db.php');

if(isset($_POST["tutor_email"]) && (!empty($_POST["tutor_email"]))){
$email = $_POST["tutor_email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    $error .="<p>Invalid email address please type a valid email address!</p>";
    }else{
    $sel_query = "SELECT * FROM `application_tutor` WHERE tutor_email='".$email."'";
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
$output.='<p><a href="http://mytutorsbd.com/tutorResetPassword.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://mytutorsbd.com/tutorResetPassword.php?key='.$key.'&email='.$email.'&action=reset</a></p>';      
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 10 minutes for security reason.</p>';
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
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <!--<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>-->
                        <i class="fa fa-user-plus" style="font-size:36px"></i>
                        <h3>Registration</h3>
                        <span>It's absoulately free!</span>
                        <a href="userRegistration.php"><input  type="submit" name="" value="Need an account"/></a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">

					
                        	<!-- tutor part start-->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Forgot Password as a Tutor.</h3>
						<form  method="post" action="" name="reset" >
                                <div class="row register-form">
									<div class="col-md-6">
                                        
                                      <div class="form-group">
                                            <input type="email" name="tutor_email" class="form-control" placeholder="Enter Your Registered Email *" maxlength="150"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="submit" class="btnRegister"  value="Reset Password"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <!-- tutor part end-->
							
                        
                        </div>
                    </div>
                </div>
            </div>
<div style="padding-bottom:2%;"></div>

<?php } ?>	
<?php include('include/bar.php');?>	
<?php include('include/footer.php');?>