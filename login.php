<?php include('include/header.php');?>
<head>
	<link rel="stylesheet" href="css/regpage.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['tutor_Login'])){
$tutor_email =$_POST['tutor_email'];
$tutor_pass = md5($_POST['tutor_pass']);//here pass will be md5
$tutorLogin = $login->tutorLogin($tutor_email,$tutor_pass);
}
?>

<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['student_login'])){
$sMail =$_POST['sMail'];
$sPass = md5($_POST['sPass']);//here pass will be md5
$studentLogin = $login->studentLogin($sMail,$sPass);
}
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
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width:auto;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tutor</a>
                            </li>
                            <li class="nav-item">
                                <a style="width:auto;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Student/Guardian</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

					
                        	<!-- tutor part start-->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Login as a Tutor.</h3>
						<form  method="post" >
                                <div class="row register-form">
									<div class="col-md-6">
                                        
                                      <div class="form-group">
                                            <input type="text" name="tutor_email" class="form-control" placeholder="Registered Email or Phone Number *" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="tutor_pass" required maxlength="20" />
                                        </div>
                                        <input type="submit" name="tutor_Login" class="btnRegister"  value="Tutor Login" style="width:auto;"/>
                                    </div>
                                   <i class="fa fa-key" style="font-size:22px;"></i><a href="tutorForgotPassword.php"style="color:#4d94ff;">&nbsp;Forgot Password</a>
                                </div>
                            </div>
                        </form>
                            <!-- tutor part end-->
							



                            <!-- studet part start-->
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Login as a Student / Guardian.</h3>
                             <form  method="post">   
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <input type="text" name="sMail" class="form-control" placeholder="Registered Email or Phone Number *"  required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="sPass" required maxlength="20" class="form-control" placeholder="Password *" />
                                        </div>
                                        <input type="submit" name="student_login" class="btnRegister" value="Student Login" style="width:auto;"/>
                                    </div></form>
                                    <i class="fa fa-key" style="font-size:22px;"></i><a href="studentForgotPassword.php"style="color:#4d94ff;">&nbsp;Forgot Password</a>
                                </div>
                            </div>
                            <!-- student part end-->
                        
                        </div>
                    </div>
                </div>
            </div>
<div style="padding-bottom:2%;"></div>
			<?php 
				if (isset($tutorLogin)){
					echo '<script type="text/javascript">alert("' . $tutorLogin . '")</script>';
			}?>
			<?php 
				if (isset($studentLogin)){
					echo '<script type="text/javascript">alert("' . $studentLogin . '")</script>';
			}?>
			
<?php include('include/footer.php');?>