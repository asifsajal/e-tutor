<?php

include('config/database_connection.php');

if(isset($_POST["action"]))
{
	/*$query = "
		SELECT * FROM application_job WHERE approval = '1' ";*/

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

WHERE application_job.approval='1' AND application_job.status='0' ";






	if(isset($_POST["district"]))
	{
		$district_filter = implode("','", $_POST["district"]);
		$query .= "
		 AND district IN('".$district_filter."')
		";
	}
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query .= "
		 AND category IN('".$category_filter."')
		";
	}
	if(isset($_POST["gender"]))
	{
		$gender_filter = implode("','", $_POST["gender"]);
		$query .= "
		 AND studentGender IN('".$gender_filter."')
		";
	} $query.= " ORDER BY application_job.jobId DESC";

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '


            <ul style="background-color: white;margin-right: 15px;padding-top:5%;margin-bottom:3%;width:100%">
              <li>
                <div class="col-xs-12">
                  <div class="blog-caption" style="margin-left: 5%;margin-right: 5%;padding-bottom:2%;">
                      <p>Job ID: &nbsp;<b>

                        '. $row['jobId'].'
                          

                        </b>
                      <span style="float:right">Posted on: <b>

                        '.$row['postTime'].'
                          

                        </b></span></p>
                      <h5><span>Need a tutor for 

                        '.$row['subCat_Name'].'

                         student</span></h5>
                      <div class="blog-by">

                        <p> <b style=" color:#007BFF">Category:</b>
                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                              '.$row['category_name'].'

                               </span>
                                    <b style=" color:#007BFF">Class:</b>
                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                               '.$row['subCat_Name'].'
                            </span>
                                    <b style=" color:#007BFF">Subject:</b>

                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                             '. $row['subjects'].'
                                

                              </span>
                        </p>

                      <span style="font-size:14px;color:#000">

                        <b>

                           '.$row['daysInAWeek'].'

                           Days Per Week</b> /&nbsp;&nbsp;
                        <b>Salary : </b>

                         '.$row['salary'].'

                         &nbsp; TK. &nbsp;&nbsp;/&nbsp;&nbsp;
                        <b>Tutor Gender Prefer: &nbsp;</b>

                         '.$row['tutorGender'].'

                      </span></br>

                      <span style="font-size:14px;color:#000">
                        <b>Number of Student:&nbsp;&nbsp;</b>

                         '. $row['studentNumber'].'

                          &nbsp; /&nbsp;&nbsp;<b>Student Gender : &nbsp;</b>

                         '.$row['studentGender'].'

                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <b>Tutoring Time: &nbsp;</b>

                         '.$row['tutoringTime'].'

                      </span></br>

                      <i class="fa fa-map-marker" aria-hidden="true" style="font-size:25px;color:#007BFF"></i>
                        <span style="font-size:16px;color:#000">&nbsp;<b>

                          '.$row['district_name'].'

                          , 

                          '. $row['area_name'].'
                            

                          </b></span></br>

                        <span style="font-size:12px;color:#000">Other Requirements -&nbsp;<b>

                          '.$row['requirments'].'
                            

                          </b></span>

                              <div class="pt-10" style="margin-bottom:35px">
                                <a href="#" class="btn clever-btn" style="float:right">Apply</a>
                              </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>















			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
	//echo $query;
}

?>
