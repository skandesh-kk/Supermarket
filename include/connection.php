<?php
require_once("constants.php");
//start connection
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
if(!$connect){
	die("Database connection Error".mysqli_error());
	}
//select database
$db = mysqli_select_db($connect,DB_NAME);
if(!$db){
	die("Database selection Error".mysqli_error());
	}	
 ?>