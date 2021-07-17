<?php include('include/header.php');?>
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
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_manager` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</p>
<a href="http://mytutorsbd.com/tutorForgotPassword.php">Click here</a><p> to reset password.</p>';
    }else{
    $row = mysqli_fetch_assoc($query);
    $expDate = $row['expDate'];
    if ($expDate >= $curDate){
    ?>


<div class="container" style="padding-top: 10%;padding-bottom: 5%;">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form method="post" action="" name="update">
                        <input type="hidden" name="action" value="update" />
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3>Reset Password</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        
                                        <input type="password" class="form-control" id="nombre" name="pass1" placeholder="Enter password" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                           
                                        </div>
                                        <input type="password" class="form-control" id="nombre" name="pass2" placeholder="Re-enter password" maxlength="20" required>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email;?>"/>
                                </div>

                             

                                <div class="text-center">
                                    <input type="submit" class="btn btn-info btn-block rounded-0 py-2" id="reset" value="Reset Password">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
    </div>
</div>
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
                }
        }
if($error!=""){
    echo "<div class='error'>".$error."</div><br />";
    }           
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
        $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
        }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
        }else{

$pass1ns = md5($pass1);
mysqli_query($con,
"UPDATE `application_student` SET `student_password`='".$pass1ns."' WHERE `student_email`='".$email."';");   

mysqli_query($con,"DELETE FROM `password_reset_manager` WHERE `email`='".$email."';");     
    
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p></div><br />';
        }       
}
?>

           
 <?php include('include/bar.php');?>               
<?php include('include/footer.php');?>