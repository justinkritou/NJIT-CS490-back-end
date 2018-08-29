<?php

require_once('databaseConn.php');

//get username & password from controller
$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT userType FROM Accounts WHERE username = '$username' AND password = '$password' ";

//execture sql statement
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
	$queryResult = $row['userType'];
}

//check if query returned any results, and create the necessary object based on those results
if (mysqli_num_rows($result) == 0) {
	$reply = array('userType' => 'none'); // 0 = unsuccessful 
} else {
	$reply = array('userType' => $queryResult); // 1 = successful 
}


echo json_encode($reply);

?>

