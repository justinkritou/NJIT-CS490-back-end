<?php

require_once('databaseConn.php');

//grab all the questions and info from the database
$sql = "SELECT ID, Question, Topic, Difficulty FROM Questions";

//execture sql statement
$result = mysqli_query($conn, $sql);

$questions = array();

while ($row = mysqli_fetch_assoc($result)){
	$questions[] = $row; //insert all the questions & info to an array
}


echo json_encode($questions);

?>

