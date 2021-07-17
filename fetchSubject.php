<?php include"config/config2.php"?>
<?php
$state_id = (int) $_GET['state_id'];
$sql = "SELECT * FROM application_subject WHERE sub_cat_in_subject=$state_id";
$result = mysqli_query($connection, $sql);
	//echo "<option disabled selected>Please Select City</option>";
while($row = mysqli_fetch_assoc($result)){


/*<input value="<?php $row['subject_name'];?>">&nbsp;<?php echo $row['subject_name']; ?>&nbsp;*/
	echo "<option value='" . $row['subject_name'] . "'>" . $row['subject_name'] ."</option>";
 }
 
?>

