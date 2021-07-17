<?php include"config/config2.php"?>
<?php

$district_id = (int) $_GET['district_id'];
$sql = "SELECT * FROM area_upazilla_area WHERE district_idOf_area=$district_id";
$result = mysqli_query($connection, $sql);
	echo "<option disabled selected>Please Select Area *</option>";
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['area_id'] . "'>" . $row['area_name'] ."</option>";
}
 
?>

