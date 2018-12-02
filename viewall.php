<?php
$servername = "localhost";
$username = "srikkanth";
$password="password";
$dbname="db";
$conn = new mysqli($servername, $username, $password,$dbname);
	$sql="SELECT * FROM Employees;";
	$result=$conn->query($sql);
	$employee=array();
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$employee[]=$row;
			/*$employee["id"]=$row["id"];
			$employee["FirstName"]=$row["firstname"];
			$employee["LastName"]=$row["lastname"];
			$employee["Gender"]=$row["gender"];
			$employee["Age"]=$row["age"];
			$employee["Email"]=$row["email"];
			$employee["Contact"]=$row["contact"];*/
		}
		$employeeJSON=json_encode($employee);
		//header('Content-type: application/json');
		echo $employeeJSON;
	}
	else{
		echo "No Record Found";
	}
?>