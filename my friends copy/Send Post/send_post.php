<?php
include("./inc/connect.inc.php");
session_start();
if(!isset($_SESSION["user_login"])) {
 $username = "";
}
else
{
       $user = $_SESSION["user_login"];
}

$post = $_POST['post'];
if ($post != "") {
	$date_added = date("Y-m-d");
	$added_by = "$username";
	$user_posted_to = "$username";

$sqlCommand = "INSERT INTO posts VALUES ('','$post', '$date_added', '$added_by', '$user_posted_to')";
$query = mysql_query($sqlCommand) or die(mysql_error());

}
else 
{
	echo "you must enter something in the post field before you can send it ..";
}

?>