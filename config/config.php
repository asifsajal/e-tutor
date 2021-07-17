<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
define('DB_DRIVER', 'mysql');
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME","tutordb");
// basic options for PDO 
$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
//connect with the server
try {
    $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $dboptions);
} catch (Exception $ex) {
    echo($ex->getMessage());
    die;}
?>

<?php
// here will goes constant variable of the application

$app_name="E-Tutor";//here will go your application name.....
$app_description="here will goes description";//here will go your application description.....
$app_slogo_path="img/core-img/mytutorsbd_logo.png";//here will go your application logo.....
$app_flogo_path="img/core-img/mytutorsbd_logo.png";



$cat1="img/category/medium.jpg";
$cat2="img/category/professional-skills.png";
$cat3="img/category/skill.jpg";
$cat4="img/category/language.png";
$cat5="img/category/admission-test.jpg";
$cat6="img/category/arts.jpg";
$cat7="img/category/Test-Preparation-Market.jpg";
$cat8="img/category/religion.jpg";


$hoverimg="img/bg-img/hoverimg.jpg";
$contimg="img/bg-img/contimg.jpg";


date_default_timezone_set('Asia/Dhaka');
?>
<?php
$con = mysqli_connect("localhost","root","","tutordb");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}

	
$error="";	
?>