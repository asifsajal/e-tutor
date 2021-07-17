<?php
//fetch.php

if(isset($_POST['action']))
{
	include('config/database_connection.php');

	$output = '';

	if($_POST["action"] == 'country')
	{
		$query = "SELECT * FROM application_sub_category WHERE catID_In_subCat= :country 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		$output .= '<option value="">Select Course</option>';
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["subCat_id"].'">'.$row["subCat_Name"].'</option>';
		}
	}
	if($_POST["action"] == 'state')
	{
		$query = "
		SELECT * FROM application_subject WHERE sub_cat_in_subject= :state
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':state'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["subject_name"].'">'.$row["subject_name"].'</option>';
		}


	}
	echo $output;
}


?>