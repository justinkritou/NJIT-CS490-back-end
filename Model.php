<?php

//set necessary database information
$host = "sql1.njit.edu";
$user = ""; //enter username
$pass = ""; //enter password
$database = "jmk62";

//connect to database
$conn = mysqli_connect($host, $user, $pass, $database);

//catch error if database can't connect
if (mysqli_connect_errno()) {
    echo "Error: Unable to connect to MySQL:" . mysqli_connect_error();
    exit;
}

//get username & password from controller
$username = $_POST['Username'];
$password = $_POST['password'];


$sql = "SELECT * FROM LoginPage WHERE username = '$username' AND password = '$password' ";

//execture sql statement
$result = mysqli_query($conn, $sql);

//check if query returned any results, and create the necessary object based on those results
if (mysqli_num_rows($result) == 0) {
	$reply = array('flag' => '0'); // 0 = unsuccessful 
} else {
	$reply = array('flag' => '1'); // 1 = successful 
}


echo json_encode($reply);

?>

