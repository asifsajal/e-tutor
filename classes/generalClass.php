<?php 
$filepath=realpath (dirname(__FILE__));
include_once ($filepath.'/../libraries/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class gnc{
	
private $db;
private $fm;
public function __construct(){
$this->db =new Database();
$this->fm =new Format();
}
//get basic information....
public function getAllcontact()
{
$query ="SELECT * FROM application_contact";
$result = $this->db->select($query);
return $result;
}
//get how you know us ....
public function knowus()
{
$query ="SELECT * FROM how_you_know_us";
$result = $this->db->select($query);
return $result;
}
//get tutor data ....
public function gettutordata($tid)
{
$query ="SELECT * FROM application_tutor WHERE tutor_id ='$tid'";
$result = $this->db->select($query);
return $result;
}
//get login student data
public function gettStudentdata($student_id)
{
$query ="SELECT * FROM application_student WHERE student_id ='$student_id'";
$result = $this->db->select($query);
return $result;
}
 //insert tutor feedback
public function submittutorfeedback($data,$file){

$tutorid = mysqli_real_escape_string($this->db->link,$data['tutorid']);
$tfeedback = mysqli_real_escape_string($this->db->link,$data['tfeedback']);

if($tutorid ==""||$tfeedback=="" ){
$msg="Oh snap! Something wrong, try again.";
return $msg;
}else{
//mysqli_query($link,'SET CHARACTER SET utf8');
//mysqli_query($link,"SET SESSION collation_connection ='utf8_general_ci'");
$query = "INSERT INTO application_tutor_feedback(tutor_ID,tutor_feedback)
VALUES('$tutorid','$tfeedback')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Thanks! Your feedback successfully seubmit.";
return $msg;
}else{$msg=" Oh snap! try again.";return $msg;}
}}

 //insert student feedback
public function submitStudentFeedback($data,$file){

$sname = mysqli_real_escape_string($this->db->link,$data['sname']);
$soccu = mysqli_real_escape_string($this->db->link,$data['soccu']);
$stfeedback = mysqli_real_escape_string($this->db->link,$data['stfeedback']);



if($sname ==""||$soccu=="" ){
$msg="Oh snap! * marked fields are required.";
return $msg;
}else{

$query = "INSERT INTO application_student_feedback(sname,soccupation,student_feedback)
VALUES('$sname','$soccu','$stfeedback')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Thanks! Your feedback successfully seubmit.";
return $msg;
}else{$msg=" Oh snap! try again.";return $msg;}
}}


//get all tutor feedback for approved
public function getTutorDafeddbackAll()
{
mysqli_query($link,'SET CHARACTER SET utf8');
mysqli_query($link,"SET SESSION collation_connection ='utf8_general_ci'");
$query ="SELECT  application_tutor.*,application_tutor_feedback.*
FROM application_tutor_feedback
INNER JOIN  application_tutor
ON application_tutor_feedback.tutor_ID =application_tutor.tutor_id
 Order By application_tutor_feedback.id Desc";
$result = $this->db->select($query);
return $result;
}
//get all tutor feedback which was approved
public function getTutorDafeddback()
{
$query ="SELECT  application_tutor.*,application_tutor_feedback.*
FROM application_tutor_feedback
INNER JOIN  application_tutor
ON application_tutor_feedback.tutor_ID =application_tutor.tutor_id WHERE application_tutor_feedback.status='1'
 Order By application_tutor_feedback.id Desc LIMIT 15";
$result = $this->db->select($query);
return $result;
}
//get all student feedback for approved
public function student_feedbackall()
{
$query ="SELECT * FROM application_student_feedback Order By id Desc";
$result = $this->db->select($query);
return $result;
}
//get all student feedback which was approved for front
public function student_feedback()
{
$query ="SELECT * FROM application_student_feedback WHERE status='1' Order By id Desc LIMIT 15";
$result = $this->db->select($query);
return $result;
}
 //apply job
public function applyJob($applyJob,$you){

$jobID = $applyJob ;
$tutorid = $you ;
$query ="SELECT * FROM application_applied_job WHERE applied_tutor_id='$tutorid' AND applied_job_ID='$jobID'";
$result = $this->db->select($query);
if($result){
while($value = $result->fetch_assoc()){
                            
$applied_tutor_id=$value['applied_tutor_id'];
$applied_job_ID=$value['applied_job_ID'];}}

if($jobID ==""||$tutorid=="" ){
$msg="Oh snap! Something wrong, try again.";
return $msg;
}elseif($jobID==$applied_job_ID){
$msg="Oh snap! You already applied for this job.";
return $msg;
}
else{
$query = "INSERT INTO application_applied_job(applied_job_ID,applied_tutor_id)
VALUES('$jobID','$tutorid')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Apply Confirmed !";
return $msg;
}else{$msg=" Oh snap! try again.";return $msg;}
}}

}

error_reporting(0);

?>