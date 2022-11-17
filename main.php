<?php


$servername = "104.197.180.175";
$username = "priya";
$password = "priya123";
$db = "orderdb";

$conn = new mysqli($servername,$username,$password,$db);

	if($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}
   
   if ( isset($_GET['user_data']) )	{ 
 	$USER = $_GET['user_data'];
   }

	

$query = "SELECT * FROM orders";


$result = $conn->query($query);

$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
	$response = array("status"=>"0","message"=>"Request Failed","data"=>$row);
}
else{
	$response = array("status"=>"1","message"=>"Request Successful","data"=>$row);
}

echo json_encode($response);

?>