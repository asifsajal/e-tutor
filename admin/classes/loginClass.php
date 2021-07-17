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
public function adminLogin($adminUsername,$adminPass){
$adminUsername = $this->fm->validation($adminUsername);
$adminPass = $this->fm->validation($adminPass);
$adminUsername = mysqli_real_escape_string($this->db->link,$adminUsername);
$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
if(empty($adminUsername)||empty($adminPass))
{$loginmsg="All fields required !";
return $loginmsg;
}else{
$query = "SELECT * FROM control_admin WHERE email = '$adminUsername' AND password  = '$adminPass'";
$result = $this->db->select($query);
if($result !=false){
$value =$result->fetch_assoc();
Session::set("adminLogin",true);
Session::set("admin_Id",$value['id']);
Session::set("admin_Name",$value['name']);
Session::set("admin_Email ",$value['email ']);
Session::set("admin_UserName ",$value['email ']);
Session::set("admin_Phone ",$value['cell']);
Session::set("admin_Type",$value['level']);
Session::set("created_at",$value['created_at']);
Session::set("admin_Address",$value['address']);
Session::set("admin_Photo",$value['photo']);

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Logged in by user (";
$valx=$adminUsername.")";
$txt = $date.$value0.$valx;//heare will be log value.....
$myfile = file_put_contents('vendors/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

header("Location:index.php");
}else{$loginmsg="Username and password not match !";
return $loginmsg;}
}
}

//change password for customer

 public function changepassadmin($data,$file){

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
}
//final end bracket is below
}
?>