<?php 
$filepath=realpath (dirname(__FILE__));
include_once ($filepath.'/../libraries/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class jobclass{
	
private $db;
private $fm;
public function __construct(){
$this->db =new Database();
$this->fm =new Format();
}

// job post
 public function JobPost($data,$file,$subjectNamesarr){

$districtName = mysqli_real_escape_string($this->db->link,$data['districtName']);
$areaName = mysqli_real_escape_string($this->db->link,$data['areaName']);
$categoryName = mysqli_real_escape_string($this->db->link,$data['categoryName']);
$courseName = mysqli_real_escape_string($this->db->link,$data['courseName']);
$studentGender = mysqli_real_escape_string($this->db->link,$data['studentGender']);
$studentName = mysqli_real_escape_string($this->db->link,$data['studentName']);
$studentPhone = mysqli_real_escape_string($this->db->link,$data['studentPhone']);
$studentInstitute = mysqli_real_escape_string($this->db->link,$data['studentInstitute']);
//$subjectNames = mysqli_real_escape_string($this->db->link,$data['subjectNames']);
$subjectNames =$subjectNamesarr;
$studentId=mysqli_real_escape_string($this->db->link,$data['studentId']);
$tutorGender = mysqli_real_escape_string($this->db->link,$data['tutorGender']);
$daysInAWeek = mysqli_real_escape_string($this->db->link,$data['daysInAWeek']);
$salary = mysqli_real_escape_string($this->db->link,$data['salary']);
$joinDate = mysqli_real_escape_string($this->db->link,$data['joinDate']);
$numberOfStudent = mysqli_real_escape_string($this->db->link,$data['numberOfStudent']);
$tutoringTime = mysqli_real_escape_string($this->db->link,$data['tutoringTime']);
$address = mysqli_real_escape_string($this->db->link,$data['address']);
$requirments = mysqli_real_escape_string($this->db->link,$data['requirments']);
$studentEmail = mysqli_real_escape_string($this->db->link,$data['studentEmail']);
$howUHearUs = mysqli_real_escape_string($this->db->link,$data['howUHearUs']);

$password = mysqli_real_escape_string($this->db->link,md5($data['password']));
$retypePassword = mysqli_real_escape_string($this->db->link,md5($data['retypePassword']));
$postTime = mysqli_real_escape_string($this->db->link,$data['postTime']);

$query ="SELECT jobId FROM application_job  ORDER BY jobId DESC LIMIT 1";
				$result = $this->db->select($query);
				if($result){
				while($value = $result->fetch_assoc()){
				                            
				$checkedid=$value['jobId'];}}
	$jobNumberbase=10000;
	$jobNumbertemp=$jobNumberbase+$checkedid;
	$jobNumber=$tutorGender.$jobNumbertemp;


/*$query ="SELECT * FROM application_student WHERE student_email='$sMail' OR student_phone='$sPhone'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$checkmails=$value['student_email'];
$checkphones=$value['student_phone'];}}*/

if($studentId !=""){


				$query = "INSERT INTO application_job (jobNumber,district,area,category,course,studentGender,studentName,phoneNumber,StudentInstitute,subjects,tutorGender,daysInAWeek,salary,studentNumber,lookingDate,tutoringTime,studentAddress,requirments,studentemail,howhearus,postTime,studentID_IF_LOGGGED) 
				VALUES('$jobNumber','$districtName','$areaName','$categoryName','$courseName','$studentGender','$studentName','$studentPhone','$studentInstitute','$subjectNames','$tutorGender','$daysInAWeek','$salary','$numberOfStudent','$joinDate','$tutoringTime','$address','$requirments','$studentEmail','$howUHearUs','$postTime','$studentId')";
							$inserted_row = $this->db->insert($query);

						if($inserted_row){

						$msg="You have Posted the job successfully ! You'll receive the 3 (max) best Tutors CVs as soon as possible which closely match to your requirments. Thank You !";
						return $msg;

						}
						else{$msg="operation failed !";return $msg;}

					}


else{ //2

				$query ="SELECT * FROM application_student WHERE student_email='$studentEmail' OR student_phone='$studentPhone'";
				$result = $this->db->select($query);
				if($result){
				while($value = $result->fetch_assoc()){
				                            
				$checkmails=$value['student_email'];
				$checkphones=$value['student_phone'];}}

					if($checkmails==$studentEmail){$msg="This e-mail already exists. Maybe you have an account. Please login and submit your request.If you forgot your password then recover it or contact with us.";
						return $msg;}

					else if($checkphones==$studentPhone){$msg="This phone number already exists. Maybe you have an account. Please login and submit your request. If you forgot your password then recover it or contact with us.";
						return $msg;}

					elseif($password!=$retypePassword)
						{$msg="Retype password not matched with Password field.";
							return $msg;}

					else{ //3

				$query = "INSERT INTO application_job (jobNumber,district,area,category,course,studentGender,studentName,phoneNumber,StudentInstitute,subjects,tutorGender,daysInAWeek,salary,studentNumber,lookingDate,tutoringTime,studentAddress,requirments,studentemail,howhearus,password,postTime,studentID_IF_LOGGGED) 
				VALUES('$jobNumber','$districtName','$areaName','$categoryName','$courseName','$studentGender','$studentName','$studentPhone','$studentInstitute','$subjectNames','$tutorGender','$daysInAWeek','$salary','$numberOfStudent','$joinDate','$tutoringTime','$address','$requirments','$studentEmail','$howUHearUs','$password','$postTime','$studentId')";
				$inserted_row = $this->db->insert($query);

				if($inserted_row){

							$query = "INSERT INTO application_student (student_name,student_email,student_phone,student_howUknowUs,student_password) 
							VALUES('$studentName','$studentEmail','$studentPhone','$howUHearUs','$password')";
							$insertedd_row = $this->db->insert($query);

							if($insertedd_row){

												$time=date_default_timezone_set('Asia/Dhaka');
												$date = date('m/d/Y h:i:s a', time());
												$value0=" Add a user (";
												$valx=$studentEmail.")";
												$txt = $date.$value0.$valx;//heare will be log value.....
												$myfile = file_put_contents('log/Web_log_file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

												$msg="You have Posted the job successfully ! You can now login by using provided e-mail and password. You'll receive the 3 (max) best Tutors CVs as soon as possible which closely match to your requirments. Thank You !";
												return $msg;

											}
												else{$msg="You have Posted the job successfully ! You'll receive the 3 (max) best Tutors CVs as soon as possible which closely match to your requirments. Thank You !";return $msg;}

							}
								else{$msg="Operation failed !";return $msg;}

						}//3


				} //main else end 2


}

//get all waiting for tutor job list....
public function getallApprovedJobsWaiting()
{
$query ="SELECT application_job.*,application_category.*,application_sub_category.*,area_district.*,area_upazilla_area.*
FROM application_job

INNER JOIN  application_category
ON application_job.category =application_category.cat_id

INNER JOIN application_sub_category
ON application_job.course = application_sub_category.subCat_id

INNER JOIN area_district
ON application_job.district =area_district.district_id

INNER JOIN area_upazilla_area
ON application_job.area =area_upazilla_area.area_id

WHERE application_job.approval=1 AND application_job.status=0 Order By application_job.jobId DESC ";
$result = $this->db->select($query);
return $result;
}



}

error_reporting(0);
?>