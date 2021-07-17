<?php include'libraries/session.php';
session::init(); ?><?php include('config/config.php');?>

<?php 
include 'classes/generalClass.php';
include_once 'helpers/format.php';
include 'classes/loginClass.php';
$fm =new Format();
$gnc =new gnc();
$login= new login();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo"$app_description";?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Title -->
  
    <title><?php echo"$app_name";?></title>
<!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
 <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>


<style>
@media screen and (min-width: 0px) and (max-width: 600px) {
  #my-content_tohide_small{ display: none; }  /* show it on smaller screen */
}
@media screen and (min-width: 601px) and (max-width: 1024px) {
  #my-content_tohide_small{ display: block; }   /* hide it on larger screens */
}
#cx {
      display: inline-block;
      height: 40px;
      line-height: 40px;
      color: white;
      font-size: 16px;
}
#demoFont {
font-family: "Arial Black", Gadget, sans-serif;
font-size: 35px;
color: #3073DB;
font-weight: 1000;
text-decoration: none;
font-style: italic;
font-variant: normal;
text-transform: none;
}
.jb{display: inline-block;
      height: 40px;
      line-height: 40px;
      color: black;
      font-size: 18px;}
</style>
<body>

    <!-- Preloader -->
    <!--<div id="preloader">
        <div class="spinner"></div>
    </div>-->

      <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
         <?php 
                $getAllcontact= $gnc->getAllcontact();
                if($getAllcontact){
                while($result = $getAllcontact->fetch_assoc()){
                ?>
        
       <div  id="my-content_tohide_small"> <div class="top-header-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info" style="padding-left:25%;">
                <a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i>
                        </span><?php echo $result['contact_cell'];?></a>
                <a href="mailto:<?php echo $result['contact_mail'];?>"><span><i class="fa fa-envelope" aria-hidden="true"></i>
                        </span><?php echo $result['contact_mail'];?></a>
            </div>
            <!--<b style="text-align:center;"><a href="blog.php" id="cx"><i class="fa fa-square-o" aria-hidden="true"></i>  Blog</a>&nbsp;&nbsp;&nbsp;-->
                  <a href="contact.php" id="cx"><i class="fa fa-address-card" aria-hidden="true"></i>  Contact</a></b>
            
            <!-- Follow Us -->
            <div class="follow-us">
                <span>Follow us</span>
                <a href="<?php echo $result['contact_facebook'];?>"target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="<?php echo $result['contact_twitter'];?>"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="<?php echo $result['contact_youtube'];?>"target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div></div>
<?php }}?>


<!-- session for tutor-->
<?php
$tutor_name= Session::get("tutor_name");
$tutor_id= Session::get("tutor_id");
$tutor_image= Session::get("tutor_image");
$tutor_user_type= Session::get("user_type");
?>
<!-- session for student-->
<?php
$student_id= Session::get("student_id");
$student_name= Session::get("student_name");
$student_image= Session::get("student_image");
$student_phone= Session::get("student_phone");
$student_email= Session::get("student_email");
$Student_user_type= Session::get("Student_user_type");

?>

<?php
$user_type_selector=$tutor_user_type;
$uts=$tutor_user_type.$Student_user_type;
?>

<?php
if(isset($_GET['action'])&&($_GET['action']=="logout"))
{
session::destroy();}
?>  

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off" class="img-responsive">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand "href="index.php" style="padding-left:5%;"><img src="<?php echo "$app_slogo_path";?>" alt="logo" style="float:left;"></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <?php if($uts=="Tutor"){?>
                                
                                <li>
                                    <a class="btn" href="jobBoard.php" >Job Board</a>
                                </li>
                                <?php } elseif($uts=="Student"){?>
                                 <li><a href="hireTutor.php" id="">Hire Tutor</a></li> <?php }else{?>
                                    <li><a href="jobBoard.php" class="btn">JOB BOARD</a></li><?php }?>
                            
                            </ul>
                            <!-- Search Button -->
                           <!-- <div class="search-area">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>-->

<!-- if login is false-->
            <?php
            $loginsel= (Session::get("tlogin")||Session::get("stulogin"));
            if($loginsel==false){ ?>
                        
                            <!-- Register / Login -->
                            <ul>
                            <div class="register-login-area">
                               <li> <a href="login.php" class="btn" >Sign In</a></li>
                               <li> <a href="hireTutor.php" type="button"  class="btn active">Hire A Tutor</a></li>
                              <li>  <a href="tutorRegistration.php" type="button"  class="btn active">Become A Tutor</a></li>
                                <!--<a type="button" class="btn active" data-toggle="modal" data-target="#login" data-whatever="@mdo">Login</a>-->
                                
                            </div> </ul><?php } else{?>
                        

                <?php if($user_type_selector =="Tutor"){ ?>
                            <!-- if login true-->
                            <!-- for tutor-->
                             <div class="register-login-area">
                                <!--<a href="userProfile.php" type="button"  class="btn active">My Profile</a>-->
                                <!--<a type="button" class="btn active" data-toggle="modal" data-target="#login" data-whatever="@mdo">Login</a>-->
                                
                            </div>
                            <div class="login-state d-flex align-items-center">
                                <div class="user-name mr-30">
                                    <div class="dropdown">Tutor:&nbsp;
                                        <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$tutor_name";?></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="userProfile.php">Profile</a>
                                            <a class="dropdown-item" href="?action=logout">Logout</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="userthumb">
                                    <img src="img/users-image/<?php echo"$tutor_image";?>" alt="<?php echo"$tutor_name";?>">
                                </div>
                            </div>

                            <!-- for student-->
                            <?php } else{?>
                                <div class="login-state d-flex align-items-center">
                                <div class="user-name mr-30">
                                    <div class="dropdown">Student:&nbsp;
                                        <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$student_name";?></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="myDashBoard.php">Profile</a>
                                            <a class="dropdown-item" href="?action=logout">Logout</a>

                                        </div>
                                    </div>
                                </div>
                                <!--<div class="userthumb">
                                    <img src="<?php echo"$student_image";?>" alt="<?php echo"$student_name";?>">
                                </div>-->
                            </div>

                            <?php

                             } ?>

                        <?php }?>

                        </div>
                        <!-- Nav End -->
                    
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->