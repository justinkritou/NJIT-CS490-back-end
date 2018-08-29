<?php

//set necessary database information
$host = "sql1.njit.edu";
$user = ""; //enter db username
$pass = ""; //enter db password
$database = "jmk62";

//connect to database
$conn = mysqli_connect($host, $user, $pass, $database);

//catch error if database can't connect
if (mysqli_connect_errno()) {
    echo "Error: Unable to connect to MySQL:" . mysqli_connect_error();
    exit;
}

?>