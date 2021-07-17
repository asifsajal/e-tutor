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
$app_name="mytutorsbd";//here will go your application name.....
$app_description="heare will goes description";//here will go your application description.....
$app_slogo_path="vendors/images/mytutorsbd_logo.png";//here will go your application description.....
$app_flogo_path="vendors/images/mytutorsbd_logo.png";

?>