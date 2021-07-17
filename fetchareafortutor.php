<?php
//fetch.php

if(isset($_POST['action']))
{
	include('config/database_connection.php');

	$output = '';

	if($_POST["action"] == 'zella')
	{
		$query = "SELECT * FROM area_upazilla_area WHERE district_idOf_area= :zella 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':zella'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		$output .= '<option value="">Select Area</option>';
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["area_name"].'">'.$row["area_name"].'</option>';
		}
	}
	echo $output;
}

?>
