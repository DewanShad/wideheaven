<?php
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$number = $_POST['number'];

//database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("connection Failed : ".$conn->connect_error);
}else{

	$stmt = $conn->prepare("insert into registration(firstName, email, gender, address, city, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $email, $gender, $address, $city, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration Successfully Completed......";
		$stmt->close();
		$conn->close();
	}
?>