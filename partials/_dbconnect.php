<!-- Establishing connection with the database -->
<?php
// $server="remotemysql.com";
// $username="GfYJT7egTF";
// $password="lW1UnyRWzL";
// $database="GfYJT7egTF";
$server="localhost";
$username="root";
$password="";
$database="thes_db";
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
	die("Error " . mysqli_connect_error());
}
?>
