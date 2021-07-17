<?php include('include/header.php');?>
<head>
    <link rel="stylesheet" href="css/regpage.css">
</head>

    <?php include 'classes/registration.php';?>
        <?php 
        $reg= new registration();
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['student_registration'])){
        $student_registration = $reg ->student_registration($_POST,$_FILES);
        }
    ?>
	
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <!--<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>-->
                        <i class="fa fa-user-plus" style="font-size:36px"></i>
                        <h3>Registration</h3>
                        <span>It's absoulately free!</span>
                        <a href="login.php"><input type="submit" name="" value="Login"/></a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        

                    
                            <!-- studet part start-->
                                <h3  class="register-heading">Register as a Student / Guardian.</h3>
                             <form class="form-horizontal"  method="post" action="" enctype="multipart/form-data">   
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="sName" class="form-control" placeholder="Name *" maxlength="150" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="sMail" class="form-control" placeholder="Email *" maxlength="190"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="sPhone"  class="form-control" placeholder="Phone *" required maxlength="11"pattern="^\d{11}$" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="sPass" required maxlength="20" class="form-control" placeholder="Password *" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="sAgainPass" maxlength="20" required class="form-control" placeholder="Confirm Password *" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="sQ" required >
                                                <option class="hidden"  selected disabled>How Did You Hear About Us?</option>
                                                 <?php 
                                                    $getAllcontact= $gnc->knowus();
                                                    if($getAllcontact){
                                                    while($result = $getAllcontact->fetch_assoc()){
                                                    ?>
                                                <option value="<?php echo $result['id'];?>"><?php echo $result['answer_options'];?></option>

                                            <?php }}?>
                                            </select>
                                        </div>
                                        <input type="submit" name="student_registration" class="btnRegister" value="Register"/>
                                    </div>
                                    <i class="fa fa-info-circle" style="font-size:22px"></i>&nbsp; By Signing up, you agree to our <a href="terms_and_conditions.php" target="_blank" style="color:#4d94ff;">&nbsp;Terms of Use and Privacy Policy</a>
                                </div>
                            
                            <!-- student part end-->
                        </form>
                    </div>
                </div>
            </div>
<div style="padding-bottom:2%;"></div>
            <?php 
                if (isset($student_registration)){
                    echo '<script type="text/javascript">alert("' . $student_registration . '")</script>';
            }?>
<?php include('include/footer.php');?>