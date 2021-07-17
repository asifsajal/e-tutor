<?php include"config/config2.php"?>
<?php

$country_id = (int) $_GET['country_id'];
$sql = "SELECT * FROM application_sub_category WHERE catID_In_subCat=$country_id";
$result = mysqli_query($connection, $sql);
	echo "<option disabled selected>Please Select Course *</option>";
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['subCat_id'] . "'>" . $row['subCat_Name'] ."</option>";
}
 
?>
