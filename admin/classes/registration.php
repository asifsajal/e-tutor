<?php 
$filepath=realpath (dirname(__FILE__));
include_once ($filepath.'/../libraries/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<style type="text/css">
       .green{color:green;}
.red{color:red;}
</style>
<?php
class registration{
private $db;
private $fm;
public function __construct(){
$this->db =new Database();
$this->fm =new Format();
}
//admin registration
 public function adminReg($data,$file){

/*$query ="SELECT * FROM control_admin";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
														
$checkmail=$value['email'];
$checkphone=$value['cell'];}}*/

$creator = mysqli_real_escape_string($this->db->link,$data['creator']);
$adminName = mysqli_real_escape_string($this->db->link,$data['adminName']);
$adminemail = mysqli_real_escape_string($this->db->link,$data['adminemail']);
$adminphone = mysqli_real_escape_string($this->db->link,$data['adminphone']);
$Password = mysqli_real_escape_string($this->db->link,md5($data['Password']));

          $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        //for image 
        $filenamet = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];

        $filenamett = str_replace(' ','',$filenamet);
        $rand1=rand(0,1000);
        date_default_timezone_set("Asia/Dhaka");
        $r2= date("Ymd_his");
        $filename1=$r2.$rand1.$filenamett;
        // Verify file extension for img 1
        $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
    if(!array_key_exists($ext1, $allowed)) die("Error: Please select a valid IMAGE format. Maybe file name is invalid.");
        // Verify file size - 5MB maximum
		
  $maxsize = 2 * 1024 * 1024;
if($filesize1> $maxsize) die("Error: File size is larger than the allowed limit.Maximum 2 Mb allowed.");
$Address = mysqli_real_escape_string($this->db->link,$data['Address']);

$query ="SELECT * FROM control_admin WHERE email='$adminemail' OR cell='$adminphone'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$checkmail=$value['email'];
$checkphone=$value['cell'];}}

if($adminName ==""||$adminemail ==""||$adminphone ==""||$Password=="" ||$Address=="")
{
$msg="<span class='red '><i class='ace-icon fa fa-bell'></i> &nbsp You Must fill all fields!!</span>";
return $msg;
}
else if($checkmail==$adminemail)
{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp This e-mail already exists.</span>";
return $msg;}
else if($checkphone==$adminphone)
{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp This phone number already exists.</span>";
return $msg;}

else{

move_uploaded_file($_FILES["image"]["tmp_name"], "vendors/images/admins/".$filename1);

$query = "INSERT INTO control_admin (name,cell,email,password,address,photo,createdBy) 
VALUES('$adminName','$adminphone','$adminemail','$Password','$Address','$filename1','$creator')";
$inserted_row = $this->db->insert($query);
if($inserted_row){

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Add a user (";
$valx=$adminemail.") by-";
$value1=$creator;
$txt = $date.$value0.$valx.$value1;//heare will be log value.....
$myfile = file_put_contents('vendors/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

$msg="<span class='green'><i class='ace-icon fa fa-bell'></i> &nbsp Admin add successfully.</span>";
return $msg;
}else{$msg="<span class='red'><i class='ace-icon fa fa-bell'></i> &nbsp Operation Failed!!!</span>";return $msg;}
}
}

}
error_reporting(0);
?>