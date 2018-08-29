<?php

require_once('databaseConn.php');

//grab all the questions and info from the database
$sql = "SELECT examName FROM Exams WHERE ID = (SELECT MAX(ID) FROM Exams)";

//execture sql statement
$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)){
	$examNameVar[] = $row; 
}

//HAS THE EXAMNAME
$examName = $examNameVar[0]["examName"];

$sql2 = "SELECT QuestionID FROM Exams WHERE ExamName = '$examName'";
$result2 = mysqli_query($conn, $sql2);

while ($row = mysqli_fetch_assoc($result2)){
	$IDsVar[] = $row; 
}

$questionIDNums = [];

foreach ($IDsVar as &$ID){
	$singleID = $ID["QuestionID"];
	array_push($questionIDNums, $singleID);
}


$ID1 = $questionIDNums[0];
$ID2 = $questionIDNums[1];
$ID3 = $questionIDNums[2];
$ID4 = $questionIDNums[3];


//Grab the questions which correspond to the latest exam
$sql = "SELECT Question, ID FROM Questions WHERE ID = '$ID1' OR ID = '$ID2' OR ID = '$ID3' OR ID = '$ID4'";

//execture sql statement
$result3 = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result3)){
	$returnQuestions[] = $row; 
}

echo json_encode($returnQuestions);

?>

