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
//get admin information....
public function getCustomerData($id)
{
$query ="SELECT * FROM control_admin WHERE id ='$id'";
$result = $this->db->select($query);
return $result;
}
//get all tutor list....
public function getTutorData()
{
$query ="SELECT * FROM application_tutor  WHERE del_stat=0 Order By tutor_id Desc";
$result = $this->db->select($query);
return $result;
}

//get all tutor list unapproved....
public function getTutorDataUnapproved()
{
$query ="SELECT * FROM application_tutor WHERE user_access= 0 AND del_stat=0 Order By tutor_id Desc";
$result = $this->db->select($query);
return $result;
}
//get all tdistrict list....
public function getallDistrict()
{
$query ="SELECT * FROM area_district Order By district_name Asc";
$result = $this->db->select($query);
return $result;
}

// add area..
 public function areaadd($data,$file){

$districtIdInArea = mysqli_real_escape_string($this->db->link,$data['districtIdInArea']);
$areaName = mysqli_real_escape_string($this->db->link,$data['areaName']);
$areaCode = mysqli_real_escape_string($this->db->link,$data['areaCode']);



if($districtIdInArea ==""||$areaName ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{
$query = "INSERT INTO area_upazilla_area (district_idOf_area,area_name,area_code) 
VALUES('$districtIdInArea','$areaName','$areaCode')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Area Add Successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
}

//approval of tutor
 public function approve($tidc){

$tid = $tidc;

if($tid ==""){
$msg="Something went wrong!";
return $msg;
}
else{
$c=1;
$query ="UPDATE application_tutor
SET 
user_access='$c'

WHERE tutor_id='$tid'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Approve successfull.";
return $msg;
}else{$msg="Approve failed !";return $msg;}
}
}

//delete tutor
public function delt($tidd){
$sId =$tidd;
$d=1;
$query ="UPDATE application_tutor
SET 
del_stat='$d'

WHERE tutor_id='$sId'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Tutor delete successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}

//get all area list....
public function getAreaData()
{
$query ="SELECT area_upazilla_area.*,area_district.*
FROM area_upazilla_area
INNER JOIN  area_district
ON area_upazilla_area.district_idOf_area =area_district.district_id
ORDER BY area_district.district_name  ASC ";
$result = $this->db->select($query);
return $result;
}

//get all category list....
public function getallcat()
{
$query ="SELECT * FROM application_category Order By category_name Asc";
$result = $this->db->select($query);
return $result;
}

// course add.
 public function courseadd($data,$file){

$course_category = mysqli_real_escape_string($this->db->link,$data['course_category']);
$courseName = mysqli_real_escape_string($this->db->link,$data['courseName']);


if($course_category ==""||$courseName ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{
$query = "INSERT INTO application_sub_category (catID_In_subCat,subCat_Name) 
VALUES('$course_category','$courseName')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Course Add Successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
}

//get all course list....
public function getcourseData()
{
$query ="SELECT application_sub_category.*,application_category.*
FROM application_sub_category
INNER JOIN  application_category
ON application_sub_category.catID_In_subCat =application_category.cat_id
ORDER BY application_category.cat_id  ASC ";
$result = $this->db->select($query);
return $result;
}

// add area..
 public function subjectadd($data,$file){

$Category = mysqli_real_escape_string($this->db->link,$data['Category']);
$SubCat = mysqli_real_escape_string($this->db->link,$data['SubCat']);
$subject = mysqli_real_escape_string($this->db->link,$data['subject']);



if($Category ==""||$SubCat ==""||$subject ==""){
$msg="You Must fill all fields!";
return $msg;
}
else{
$query = "INSERT INTO application_subject (cat_in_subject,sub_cat_in_subject,subject_name) 
VALUES('$Category','$SubCat','$subject')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Subject Add Successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
}

//get all subject list....
public function getsubjectData()
{
$query ="SELECT application_subject.*,application_sub_category.*,application_category.*
FROM application_subject
INNER JOIN  application_sub_category
ON 
application_subject.sub_cat_in_subject=application_sub_category.subCat_id

INNER JOIN application_category
ON
application_subject.cat_in_subject=application_category.cat_id

ORDER BY application_category.cat_id ASC ";
$result = $this->db->select($query);
return $result;
}


//get all unapproved job list....
public function getallUnApprovedJobs()
{
$query ="SELECT application_job.*,application_category.*,application_sub_category.*,area_district.*
FROM application_job

INNER JOIN  application_category
ON application_job.category =application_category.cat_id

INNER JOIN application_sub_category
ON application_job.course = application_sub_category.subCat_id

INNER JOIN area_district
ON application_job.district =area_district.district_id

WHERE application_job.approval=0 AND application_job.status=0 Order By postTime ASC ";
$result = $this->db->select($query);
return $result;
}

//get all approved job list....
public function getallApprovedJobs()
{
$query ="SELECT application_job.*,application_category.*,application_sub_category.*,area_district.*
FROM application_job

INNER JOIN  application_category
ON application_job.category =application_category.cat_id

INNER JOIN application_sub_category
ON application_job.course = application_sub_category.subCat_id

INNER JOIN area_district
ON application_job.district =area_district.district_id

WHERE application_job.approval=1 Order By postTime ASC ";
$result = $this->db->select($query);
return $result;
}


/*public function test()
{

$query ="SELECT application_job.*,application_category.*,application_sub_category.*,area_district.*
FROM application_job

INNER JOIN  application_category
ON application_job.category =application_category.cat_id

INNER JOIN application_sub_category
ON application_job.course = application_sub_category.subCat_id

INNER JOIN area_district
ON application_job.district =area_district.district_id

WHERE application_job.approval=1 Order By postTime ASC ";
$result = $this->db->select($query);
return $result;


}*/


//delete job
public function deljob($jobid){
$jobid =$jobid;
$d=2;
$query ="UPDATE application_job
SET 
status='$d',
approval='$d'

WHERE jobId='$jobid'";

$updated_row = $this->db->update($query);
if($updated_row){

$msg="Job delete successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}

//approve job
public function approvejob($approvejobID){
$approvejobID =$approvejobID;
$d=1;
$query ="UPDATE application_job
SET 
approval='$d'
WHERE jobId='$approvejobID'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Job Approve successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}

//get job details by jobid----
public function getjobbyID($jobid)
{

$jobid=$jobid;
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

WHERE application_job.jobId=$jobid ";
$result = $this->db->select($query);
return $result;
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

WHERE application_job.approval=1 AND application_job.status=0 Order By postTime ASC ";
$result = $this->db->select($query);
return $result;
}

//approve job tutor confirm
public function confirmjob($confirmjob){
$confirmjob =$confirmjob;
$d=1;
$query ="UPDATE application_job
SET 
status='$d'
WHERE jobId='$confirmjob'";
$updated_row = $this->db->update($query);
if($updated_row){

$e=0;
$query ="UPDATE application_applied_job
SET 
state='$e'
WHERE applied_job_ID='$confirmjob'";
$updated_row = $this->db->update($query);
if($updated_row){
$msg="Tutor Assigned successfully.";
return $msg;}
}else{$msg="Operation failed !";return $msg;}
}


//get all unapproved jobs count....
public function getJobsDataUnapproved()
{
$query ="SELECT * FROM application_job WHERE  approval= 0 AND status=0 ";
$result = $this->db->select($query);
return $result;
}

//get all posted jobs count....
public function getJobsDataposted()
{
$query ="SELECT * FROM application_job WHERE  approval=1 AND status=0 ";
$result = $this->db->select($query);
return $result;
}

//get all posted jobs count....
public function getJobsDataAll()
{
$query ="SELECT * FROM application_job";
$result = $this->db->select($query);
return $result;
}

//get all tutor feedback unapproved
public function getTutorfeddbackUap()
{
$query ="SELECT * FROM application_tutor_feedback WHERE status= 0";
$result = $this->db->select($query);
return $result;
}

//delete tutor feedback....
public function tdelfed($tdelfed){
$tdelfed=$tdelfed;
$query ="DELETE FROM application_tutor_feedback WHERE id ='$tdelfed'";
$deldata = $this->db->delete($query);
if($deldata){
$msg=" Deleted successfully.";
 return $msg;
}else{
 $msg="Sorry, Operation failed!";
return $msg;
 }}

 //delete subject from DB....
public function delsub($delsub){
$delsub=$delsub;
$query ="DELETE FROM application_subject WHERE subject_id ='$delsub'";
$deldata = $this->db->delete($query);
if($deldata){
$msg=" Deleted successfully.";
 return $msg;
}else{
 $msg="Sorry, Operation failed!";
return $msg;
 }}

//tutor feedback confirm
public function tconfed($tconfed){
$tconfed =$tconfed;
$d=1;
$query ="UPDATE application_tutor_feedback
SET 
status='$d'
WHERE id='$tconfed'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Feedback Approve successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}

//get all tutor feedback approved
public function getTutorDafeddbackAll()
{
$query ="SELECT  application_tutor.*,application_tutor_feedback.*
FROM application_tutor_feedback
INNER JOIN  application_tutor
ON application_tutor_feedback.tutor_ID =application_tutor.tutor_id
 Order By application_tutor_feedback.id Desc";
$result = $this->db->select($query);
return $result;
}


//get all student feedback unapproved
public function student_feedback()
{
$query ="SELECT * FROM application_student_feedback WHERE status= 0";
$result = $this->db->select($query);
return $result;
}

//delete student feedback....
public function delfed($delfed){
$delfed=$delfed;
$query ="DELETE FROM application_student_feedback WHERE id ='$delfed'";
$deldata = $this->db->delete($query);
if($deldata){
$msg=" Deleted successfully.";
 return $msg;
}else{
 $msg="Sorry, Operation failed!";
return $msg;
 }}
//delete subcategory....
public function delcd($delcd){
$delcd=$delcd;
$query ="DELETE FROM application_sub_category WHERE subCat_id ='$delcd'";
$deldata = $this->db->delete($query);
if($deldata){
$msg=" Deleted successfully.";
 return $msg;
}else{
 $msg="Sorry, Operation failed!";
return $msg;
 }}
//student feedback confirm
public function confed($confed){
$confed =$confed;
$d=1;
$query ="UPDATE application_student_feedback
SET 
status='$d'
WHERE id='$confed'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Feedback Approve successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
//student feedback remove state 0
public function rem($remfed){
$remfed =$remfed;
$d=0;
$query ="UPDATE application_student_feedback
SET 
status='$d'
WHERE id='$remfed'";
$updated_row = $this->db->update($query);
if($updated_row){

$msg="Feedback Remove successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
//get all student feedback approved
public function student_feedbackall()
{
$query ="SELECT * FROM application_student_feedback Order By id Desc";
$result = $this->db->select($query);
return $result;
}


//get all applied job count  list....
public function getallappliedJobs()
{
$query ="SELECT DISTINCT applied_job_ID FROM application_applied_job WHERE state=1";
$result = $this->db->select($query);
return $result;
}

//get all applied  tutor job list....
public function getallappliedjobsview()
{
$query ="SELECT DISTINCT (application_applied_job.applied_job_ID),application_job.*,application_category.*,application_sub_category.*,area_district.*,area_upazilla_area.*
FROM application_job

INNER JOIN  application_category
ON application_job.category =application_category.cat_id

INNER JOIN application_sub_category
ON application_job.course = application_sub_category.subCat_id

INNER JOIN area_district
ON application_job.district =area_district.district_id

INNER JOIN area_upazilla_area
ON application_job.area =area_upazilla_area.area_id

INNER JOIN  application_applied_job
ON application_job.jobId=application_applied_job.applied_job_ID

WHERE application_job.approval=1 AND application_job.status=0 AND application_applied_job.state=1 Order By postTime ASC ";
$result = $this->db->select($query);
return $result;
}


//get all  tutor list for a single job ....
public function galli($jobidz)
{
$jobid=$jobidz;
$query ="SELECT  application_tutor.*,application_applied_job.*,application_job.*
FROM application_applied_job

INNER JOIN  application_tutor
ON application_applied_job.applied_tutor_id=application_tutor.tutor_id

INNER JOIN  application_job
ON application_applied_job.applied_job_ID=application_job.jobId

WHERE application_applied_job.applied_job_ID=$jobid AND application_applied_job.state=1

 Order By application_applied_job.apply_time ASC";
$result = $this->db->select($query);
return $result;
}

public function gallix($jobidz)//for test
{
$jobid=$jobidz;
$query ="SELECT * FROM application_applied_job



WHERE applied_job_ID=$jobid AND state=1 Order By apply_time ASC ";
$result = $this->db->select($query);
return $result;
}

//get tutor cv details....
public function tutorcv($identificationID)
{
$tuid=$identificationID;
$query ="SELECT * FROM application_tutor
WHERE tutor_id=$tuid ";
$result = $this->db->select($query);
return $result;
}
//select area for edit single
public function EA($aid)
{
$query ="SELECT * FROM area_upazilla_area WHERE area_id=$aid";
$result = $this->db->select($query);
return $result;
}

//area edit
public function areaedit($data,$file){

$areaName = mysqli_real_escape_string($this->db->link,$data['areaName']);
$areaCode = mysqli_real_escape_string($this->db->link,$data['areaCode']);
$areaid = mysqli_real_escape_string($this->db->link,$data['areaid']);

$query ="UPDATE area_upazilla_area
SET 
area_name='$areaName',
area_code='$areaCode'
 WHERE area_id=$areaid";

$updated_row = $this->db->update($query);
if($updated_row){

$msg="Save successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}

//select course for edit single
public function EC($couid)
{
$query ="SELECT * FROM application_sub_category WHERE subCat_id=$couid";
$result = $this->db->select($query);
return $result;
}
//select subject for edit single
public function ECsub($subid)
{
$query ="SELECT * FROM application_subject WHERE subject_id=$subid";
$result = $this->db->select($query);
return $result;
}

//course edit
public function courseedit($data,$file){

$courseName = mysqli_real_escape_string($this->db->link,$data['courseName']);
$couid = mysqli_real_escape_string($this->db->link,$data['couid']);

$query ="UPDATE application_sub_category
SET 
subCat_Name='$courseName'
 WHERE subCat_id=$couid";

$updated_row = $this->db->update($query);
if($updated_row){

$msg="Save successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
//subject edit
public function subjectedit($data,$file){

$subjectName = mysqli_real_escape_string($this->db->link,$data['subjectName']);
$subjectid = mysqli_real_escape_string($this->db->link,$data['subjectid']);

$query ="UPDATE application_subject
SET 
subject_name='$subjectName'
 WHERE subject_id=$subjectid";

$updated_row = $this->db->update($query);
if($updated_row){

$msg="Save successfully.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
///add category
public function cateadd($data,$file)
{
$cateName = mysqli_real_escape_string($this->db->link,$data['cateName']);

$query="INSERT INTO application_category (category_name) 
VALUES('$cateName')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Category Add Successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
//get all payment count  list....
public function countPayment()
{
$query ="SELECT DISTINCT payment_id FROM application_payment";
$result = $this->db->select($query);
return $result;
}
//get all paymentlist list....
public function paymentlist()
{
//$query ="SELECT * FROM application_payment";

/*$query ="SELECT  application_tutor.*,application_payment.*,application_job.*
FROM application_payment
INNER JOIN  application_tutor
ON  application_payment.payment_tutor_id=application_tutor.tutor_ID
INNER JOIN  application_job
ON  application_payment.paid_job_id=application_job.jobId
Order By application_payment.payment_id Desc";*/


$query ="select job.*, tutor.*,payment.*
from application_job job, application_tutor tutor, application_payment payment
where job.jobNumber = payment.paid_job_id and tutor.tutor_id = payment.payment_tutor_id";
$result = $this->db->select($query);
return $result;
}

 //delete payment....
public function deletepayment($deletepayid){
$deletepaymentid=$deletepayid;
$query ="DELETE FROM application_payment WHERE payment_id ='$deletepaymentid'";
$deldata = $this->db->delete($query);
if($deldata){
$msg=" Deleted successfully.";
 return $msg;
}else{
 $msg="Sorry, Operation failed!";
return $msg;
 }}
 // add payment..
 public function submitpay($data,$file){

$payTutorID = mysqli_real_escape_string($this->db->link,$data['payTutorID']);;
$payJobID = mysqli_real_escape_string($this->db->link,$data['payJobID']);;
$payaAount = mysqli_real_escape_string($this->db->link,$data['payaAmount']);;
$payType = mysqli_real_escape_string($this->db->link,$data['payType']);;
$txnid = mysqli_real_escape_string($this->db->link,$data['txnid']);;



if($payTutorID ==""||$payJobID ==""||$payaAount==""||$payType==""){
$msg="You Must fill * marked fields!";
return $msg;
}
else{
$query = "INSERT INTO application_payment(payment_tutor_id,paid_job_id,paid_amount,payment_method,txnID)
         VALUES ('$payTutorID','$payJobID','$payaAount','$payType','$txnid')";
$inserted_row = $this->db->insert($query);
if($inserted_row){
$msg="Payment Add Successfull.";
return $msg;
}else{$msg="Operation failed !";return $msg;}
}
}

}
?>