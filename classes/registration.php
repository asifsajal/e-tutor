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
//tutor registration
 public function tutor_registration($data,$file){

$tutor_name = mysqli_real_escape_string($this->db->link,$data['tutor_name']);
$tutor_email = mysqli_real_escape_string($this->db->link,$data['tutor_email']);
$tutor_Phone = mysqli_real_escape_string($this->db->link,$data['tutor_Phone']);
$alt_tutor_Phone = mysqli_real_escape_string($this->db->link,$data['alt_tutor_Phone']);

$tutor_pass = mysqli_real_escape_string($this->db->link,md5($data['tutor_pass']));
$tutor_again_pass = mysqli_real_escape_string($this->db->link,md5($data['tutor_again_pass']));
$tutor_gender = mysqli_real_escape_string($this->db->link,$data['tutor_gender']);
$turor_medium = mysqli_real_escape_string($this->db->link,$data['medium']);

$tutor_father_name = mysqli_real_escape_string($this->db->link,$data['tutor_father_name']);
$tutor_mother_name = mysqli_real_escape_string($this->db->link,$data['tutor_mother_name']);
$tutor_NID = mysqli_real_escape_string($this->db->link,$data['tutor_NID']);
$dob = mysqli_real_escape_string($this->db->link,$data['dob']);
$religion = mysqli_real_escape_string($this->db->link,$data['religion']);
$blood = mysqli_real_escape_string($this->db->link,$data['blood']);
$present_address = mysqli_real_escape_string($this->db->link,$data['present_address']);
$permanent_address = mysqli_real_escape_string($this->db->link,$data['permanent_address']);
$tutor_HEQ = mysqli_real_escape_string($this->db->link,$data['tutor_HEQ']);
$tutor_CIN = mysqli_real_escape_string($this->db->link,$data['tutor_CIN']);
$tutor_CIN_SUB = mysqli_real_escape_string($this->db->link,$data['tutor_CIN_SUB']);
$extraact = mysqli_real_escape_string($this->db->link,$data['extraact']);


$ssc=$_POST["ssc"];
$hsc=$_POST["hsc"];
$grad=$_POST["grad"];
$master=$_POST["master"];

$sscval = implode(",",$ssc);
$hscval = implode(",",$hsc);
$gradval = implode(",",$grad);
$masterval = implode(",",$master);

$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        //for image 
        $filenamet = $_FILES["ppicture"]["name"];
        $filetype = $_FILES["ppicture"]["type"];
        $filesize = $_FILES["ppicture"]["size"];

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
    

$query ="SELECT * FROM application_tutor WHERE tutor_email='$tutor_email' OR tutor_phone='$tutor_Phone'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$checkmail=$value['tutor_email'];
$checkphone=$value['tutor_phone'];}}

/*if($tutor_name ==""||$tutor_email ==""||$tutor_Phone ==""||$tutor_gender=="" ||$tutor_pass==""||$turor_medium==""||
$tutor_father_name==""||$tutor_mother_name ==""||$tutor_NID ==""||$dob ==""||$tutor_HEQ ==""||$tutor_CIN ==""||$tutor_CIN_SUB ==""||$present_address ==""){
$msg="You Must fill * marked fields!";
return $msg;
}else*/  if($checkmail==$tutor_email){$msg="This e-mail already exists.";
return $msg;}
else if($checkphone==$tutor_Phone){$msg="This phone number already exists.";
return $msg;}
elseif($tutor_pass!=$tutor_again_pass)
{$msg="Retype password not matched.";
return $msg;}
else{
//move_uploaded_file($source,$save);
move_uploaded_file($_FILES["ppicture"]["tmp_name"], "img/users-image/".$filename1);
$query = "INSERT INTO application_tutor (tutor_name,tutor_email,tutor_phone,tutor_alter_phone,tutor_Prefer_medium,tutor_password,tutor_gender,fatherName,motherName,religion,ssc,hsc,graduation,masters,NIDBID,presentAddress,permanentAddress,dob,tutor_image,EHQ,CIN,CIN_SUB,extraActivities)
VALUES('$tutor_name','$tutor_email','$tutor_Phone','$alt_tutor_Phone','$turor_medium','$tutor_pass','$tutor_gender','$tutor_father_name','$tutor_mother_name','$religion','$sscval','$hscval','$gradval','$masterval','$tutor_NID','$present_address','$permanent_address','$dob','$filename1','$tutor_HEQ','$tutor_CIN','$tutor_CIN_SUB','$extraact')";
$inserted_row = $this->db->insert($query);
if($inserted_row){

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Add a user (";
$valx=$tutor_email.")";
$txt = $date.$value0.$valx;//heare will be log value.....
$myfile = file_put_contents('log/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

$msg="Registration successfull.Your account will review by our expert and then it will be active.";
return $msg;
}else{$msg="Registration failed !";return $msg;}
}
}


// student registration..
 public function student_registration($data,$file){

$sName = mysqli_real_escape_string($this->db->link,$data['sName']);
$sMail = mysqli_real_escape_string($this->db->link,$data['sMail']);
$sPhone = mysqli_real_escape_string($this->db->link,$data['sPhone']);
$sPass = mysqli_real_escape_string($this->db->link,md5($data['sPass']));
$sAgainPass = mysqli_real_escape_string($this->db->link,md5($data['sAgainPass']));
$sQ = mysqli_real_escape_string($this->db->link,$data['sQ']);

$query ="SELECT * FROM application_student WHERE student_email='$sMail' OR student_phone='$sPhone'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$checkmail=$value['student_email'];
$checkphone=$value['student_phone'];}}

if($sName ==""||$sMail ==""||$sPhone ==""||$sPass==""||$sQ==""){
$msg="You Must fill all fields!";
return $msg;
}else if($checkmail == $sMail){$msg="This e-mail already exists.";
return $msg;}
else if($checkphone == $sPhone){$msg="This phone number already exists.";
return $msg;}
elseif($sPass!=$sAgainPass)
{$msg="Retype password not matched.";
return $msg;}
else{

$query = "INSERT INTO application_student (student_name,student_email,student_phone,student_howUknowUs,student_password) 
VALUES('$sName','$sMail','$sPhone','$sQ','$sPass')";
$inserted_row = $this->db->insert($query);
if($inserted_row){

$time=date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
$value0=" Add a user (";
$valx=$sMail.")";
$txt = $date.$value0.$valx;//heare will be log value.....
$myfile = file_put_contents('log/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

$msg="Registration successfull.";
return $msg;
}else{$msg="Registration failed !";return $msg;}
}
}
//tutor profile update
 public function updateTutorProfile($tuid,$sscval,$hscval,$gradval,$masterval,$tutorName,$Dob,$Father,$Mother,$Citizenship,$Phone,$religion,$Skills,$PresentAddress,$PermanentAddress,$why,$tutor_gender,$extraActivities){

$tuid = $tuid;
$sscval=$sscval;
$hscval=$hscval;
$gradval=$gradval;
$masterval=$masterval;

$tutorName = $tutorName;
$Dob = $Dob;
$Father = $Father;
$Mother = $Mother;
$Citizenship =$Citizenship ;
$Phone =$Phone;
$religion = $religion;
$Skills = $Skills;
$tutor_gender=$tutor_gender;
$extraActivities=$extraActivities;
//$district = mysqli_real_escape_string($this->db->link,$data['district']);
//$area = mysqli_real_escape_string($this->db->link,$data['area']);
$PresentAddress =$PresentAddress ;
$PermanentAddress = $PermanentAddress;
$why =$why ;



if($tutorName ==""||$Phone ==""){
$msg="You Must fill Name and Phone field !";
return $msg;
}
else{
$query ="UPDATE application_tutor
SET 
tutor_name='$tutorName',
tutor_phone='$Phone',
fatherName='$Father',
motherName='$Mother',
religion='$religion',
ssc='$sscval',
hsc='$hscval',
tutor_gender='$tutor_gender',
graduation='$gradval',
masters='$masterval',
NIDBID='$Citizenship',
presentAddress='$PresentAddress',
permanentAddress='$PermanentAddress',
experience='$Skills',
whyHire='$why',
extraActivities='$extraActivities',
dob='$Dob'

WHERE tutor_id='$tuid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Update successfull.";
return $msg;
}else{$msg="Update failed !";return $msg;}
}
}

//tutor profile update area and salary exp and others
 public function updateinfo($data,$file,$sid,$areaNames){

$district = mysqli_real_escape_string($this->db->link,$data['district']);
$expsalary = mysqli_real_escape_string($this->db->link,$data['expsalary']);
$experience = mysqli_real_escape_string($this->db->link,$data['experience']);
$whyhire = mysqli_real_escape_string($this->db->link,$data['whyhire']);
$areaNames = $areaNames;
$tid=$sid;

if($tid ==""||$areaNames ==""||$expsalary ==""){
$msg="You Must fill * marked fields!";
return $msg;
}
else{
$query ="UPDATE application_tutor
SET 
prefer_district ='$district',
prefer_area ='$areaNames',
prefer_salary='$expsalary',
experience='$experience',
whyHire='$whyhire'

WHERE tutor_id='$tid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Update successfull.";
return $msg;
}else{$msg="Update failed !";return $msg;}
}
}

//student profile update
 public function updtstpro($data,$file,$sid){

$stnm = mysqli_real_escape_string($this->db->link,$data['stnm']);
$staddrs = mysqli_real_escape_string($this->db->link,$data['staddrs']);
$stpn = mysqli_real_escape_string($this->db->link,$data['stpn']);
$sid=$sid;

if($stnm ==""||$stpn ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{
$query ="UPDATE application_student
SET 
student_name='$stnm',
student_phone='$stpn',
student_address='$staddrs'

WHERE student_id='$sid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Update successfull.";
return $msg;
}else{$msg="Update failed !";return $msg;}
}
}


//student pass update
 public function updtpassword($data,$file,$sid){

$curpass = mysqli_real_escape_string($this->db->link,md5($data['curpass']));
$newpass = mysqli_real_escape_string($this->db->link,md5($data['newpass']));
$sid=$sid;

if($curpass ==""||$newpass ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{

$query ="SELECT * FROM application_student WHERE student_id='$sid'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$curntpas=$value['student_password'];}}

if($curntpas !=$curpass){
  $msg="Current password is not correct !";
return $msg;
}else{

$query ="UPDATE application_student
SET 
student_password='$newpass'

WHERE student_id='$sid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Update successfull.";
return $msg;
}else{$msg="Update failed !";return $msg;}}
}
}

//tutor pass update
 public function updtp($data,$file,$sid){

$tcurpass = mysqli_real_escape_string($this->db->link,md5($data['tcurpass']));
$tnewpass = mysqli_real_escape_string($this->db->link,md5($data['tnewpass']));
$sid=$sid;

if($tcurpass ==""||$tnewpass ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{

$query ="SELECT * FROM application_tutor WHERE tutor_id='$sid'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$tcurntpas=$value['tutor_password'];}}

if($tcurntpas !=$tcurpass){
  $msg="Current password is not correct !";
return $msg;
}else{

$query ="UPDATE application_tutor
SET 
tutor_password='$tnewpass'

WHERE tutor_id='$sid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Update successfull.";
return $msg;
}else{$msg="Update failed !";return $msg;}}
}
}

//tutor image update
 public function uploadeimg($data,$file,$sid){

$sid=$sid;
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        //for image 
        $filenamet = $_FILES["pcimage"]["name"];
        $filetype = $_FILES["pcimage"]["type"];
        $filesize = $_FILES["pcimage"]["size"];

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
if($filesize1> $maxsize) die("Error: File size is larger than the allowed limit.Maximum 2 MB allowed.");

//move_uploaded_file($source,$save);
move_uploaded_file($_FILES["pcimage"]["tmp_name"], "img/users-image/".$filename1);

$query ="UPDATE application_tutor
SET 
tutor_image='$filename1'
WHERE tutor_id='$sid'";

$updated_row = $this->db->update($query);
if($updated_row){
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
      $msg="Image update successfully.Changes will affect after nex login. If not, then change the image name.";
return $msg;
    }
else{$msg="Update failed !";return $msg;
}


}

//end of admin registration  class

}

error_reporting(0);
?>