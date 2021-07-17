<?php 
$filepath=realpath (dirname(__FILE__));
include_once ($filepath.'/../libraries/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../libraries/session.php');
session::checkLogin();
?>

<?php
class login{
private $db;
private $fm;
public function __construct(){
$this->db =new Database();
$this->fm =new Format();
}
//tutor login
public function tutorLogin($tutor_email,$tutor_pass){

$tutor_email = mysqli_real_escape_string($this->db->link,$tutor_email);
$tutor_pass = mysqli_real_escape_string($this->db->link,$tutor_pass);

if(empty($tutor_email)||empty($tutor_pass))
{$loginmsg="All fields required !";
return $loginmsg;
}

else{
$query = "SELECT * FROM application_tutor WHERE (tutor_email = '$tutor_email'|| tutor_phone='$tutor_email') AND tutor_password = '$tutor_pass' AND user_access=1 AND del_stat=0 " ;
$result = $this->db->select($query);
if($result !=false){
$value =$result->fetch_assoc();
Session::set("tlogin",true);
Session::set("tutor_id",$value['tutor_id']);
Session::set("tutor_name",$value['tutor_name']);
Session::set("tutor_email ",$value['tutor_email ']);
Session::set("tutor_phone ",$value['tutor_phone']);
Session::set("user_type",$value['user_type']);
Session::set("tutor_Prefer_medium",$value['tutor_Prefer_medium']);
Session::set("tutor_gender",$value['tutor_gender']);
Session::set("tutor_image",$value['tutor_image']);

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Logged in by user (";
$valx=$tutor_email.")";
$txt = $date.$value0.$valx;//heare will be log value.....
$myfile = file_put_contents('log/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

header("Location:jobBoard.php");
}else{$loginmsg="E-mail/Phone number and password not match !";
return $loginmsg;}
}
}

//student login

public function studentLogin($sMail,$sPass){

$sMail = mysqli_real_escape_string($this->db->link,$sMail);
$sPass = mysqli_real_escape_string($this->db->link,$sPass);

if(empty($sMail)||empty($sPass))
{$loginmsg="All fields required !";
return $loginmsg;
}

else{
$query = "SELECT * FROM  application_student WHERE  student_email = '$sMail' || student_phone ='$sMail' AND student_password = '$sPass'";
$result = $this->db->select($query);
if($result !=false){
$value =$result->fetch_assoc();
Session::set("stulogin",true);
Session::set("student_id",$value['student_id']);
Session::set("student_name",$value['student_name']);
Session::set("student_email",$value['student_email']);
Session::set("student_phone",$value['student_phone']);
Session::set("Student_user_type",$value['Student_user_type']);
Session::set("student_image",$value['student_image']);

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Logged in by user (";
$valx=$sMail.")";
$txt = $date.$value0.$valx;//heare will be log value.....
$myfile = file_put_contents('log/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

header("Location:myDashBoard.php");
}else{$loginmsg="E-mail and password not match !";
return $loginmsg;}
}
}

//change password for customer

 /*public function changepassadmin($data,$file){

$cpmail = mysqli_real_escape_string($this->db->link,$data['adminrecmail']);
$oldPassword = mysqli_real_escape_string($this->db->link,$data['secretcode']);
$newpass = mysqli_real_escape_string($this->db->link,md5($data['newpassad']));

$query ="SELECT admin_Email,admin_Password FROM tbl_adminlogin WHERE admin_Email='$cpmail'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
 $checkmail=$value['admin_Email'];
$checoldpass=$value['admin_Password'];
}}
 														
if($cpmail ==""||$oldPassword ==""||$newpass =="")
{
$msg="<span class='red '><i class='ace-icon fa fa-bell'></i> &nbsp You Must fill all fields!!</span>";
return $msg;
}
else if($cpmail!=$checkmail)
{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp This e-mail is wrong.</span>";
return $msg;}

else if($oldPassword!=$checoldpass)
{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp This code is not valid.</span>";
return $msg;
}
else if($checkmail==$cpmail && $checoldpass == $oldPassword)
{
$query ="UPDATE tbl_adminlogin
SET 
admin_Password='$newpass'
WHERE admin_Email ='$cpmail'";
$updated_row = $this->db->update($query);
if($updated_row){
$msg="<span class='green'><i class='ace-icon fa fa-bell'></i> &nbsp Password change successfully.</span>";
return $msg;
}else{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp Operation Failed!!!</span>";return $msg;}

}else{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp Something wrong!!!</span>";return $msg;}
}*/
//final end bracket is below
}
?>