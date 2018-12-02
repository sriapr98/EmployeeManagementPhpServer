<?php
$servername = "localhost";
$username = "srikkanth";
$password="password";
$dbname="db";
$conn = new mysqli($servername, $username, $password,$dbname);
$id=intval($_GET['Id']);
$action=$_GET['Action'];
if($action==='View'){
	$sql="SELECT * FROM Employees WHERE id=$id;";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$employee->id=$row["id"];
			$employee->FirstName=$row["firstname"];
			$employee->LastName=$row["lastname"];
			$employee->Gender=$row["gender"];
			$employee->Age=$row["age"];
			$employee->Email=$row["email"];
			$employee->Contact=$row["contact"];
		}
		$employeeJSON=json_encode($employee);
		//header('Content-type: application/json');
		echo $employeeJSON;
	}
	else{
		echo "No Record Found";
	}
}
elseif ($action==='Delete') {
	echo "Delete Hello";
	$sql="DELETE FROM Employees WHERE id=$id;";
	if($conn->query($sql)){
		echo "Employee Record Deleted Successfully";
	}
	else{
		echo "Error".$conn->error;
	}
}
?>