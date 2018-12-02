<?php
$servername = "localhost";
$username = "srikkanth";
$password="password";
$dbname="db";
$data = json_decode(file_get_contents('php://input'),true);
$action=$data['Action'];
$id=intval($data['Employeeid']);
$firstname=$data['FirstName'];
$lastname=$data['LastName'];
$gender=$data['Gender'];
$age=intval($data['Age']);
$email=$data['Email'];
$phone=$data['Contact'];
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
echo $action;
if($action==='Add'){
	$sqlcreat= "CREATE TABLE IF NOT EXISTS Employees (
	id INT(6) NOT NULL PRIMARY KEY, 
	firstname VARCHAR(3000) NOT NULL,
	lastname VARCHAR(30),
	gender VARCHAR(30) NOT NULL,
	age INT(6) NOT NULL,
	email VARCHAR(50) NOT NULL,
	contact VARCHAR(200) NOT NULL
	);";
	$sqlinsert="INSERT INTO Employees VALUES($id,'$firstname','$lastname','$gender',$age,'$email','$phone');";
	if ($conn->query($sqlcreat)===TRUE and $conn->query($sqlinsert)===TRUE) {
		echo "Added Record successfully";
	} 
	else{
		echo "Error  " . $conn->error;
	}
}
else if($action==='Update'){
	echo "Hello";
	$sql="UPDATE Employees SET firstname='$firstname',lastname='$lastname',gender='$gender',age='$age',email='$email',contact='$phone' WHERE id=$id;";
	if($conn->query($sql)===TRUE){
		echo "Record Updated Successfully";
	}
	else{
		echo "Error ".$conn->error;
	}
}
$conn->close();
?>