<?php

$host = "sql1.njit.edu";
$user = ""; //enter db username
$pass = ""; //enter db password
$database = "jmk62";

//connect to database
$conn = new mysqli($host, $user, $pass, $database);

//catch error if database can't connect
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//grab posted data
$questionID = $_POST['questions'];
$examName = $_POST['examName'];
$pointValue = $_POST['points'];
$ind = sizeof($questionID);



//SQL statement to insert single question into exam table
$sql = "INSERT INTO Exams (ExamName, QuestionID, PointValue) VALUES (?, ?, ?)";

//execute the query for each question being added
for ($i = 0; $i < $ind; $i++){
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sss", $examName, $questionID[$i], $pointValue[$i]);
	$stmt->execute();
}

$stmt->close();
$conn->close();

?>