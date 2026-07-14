<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//submit
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$age = $_POST['age'];
	$sql = "INSERT INTO users (id, name, age, status)
VALUES ('', '$name', $age, 0)";
	if ($conn->query($sql) === TRUE) {
		header("Location: home.php");
		exit();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
//toggle
if(isset($_POST['toggle'])){
	$id = $_POST['id'];
	$sql = "UPDATE users SET status= NOT status  WHERE id= $id";
	if ($conn->query($sql) === TRUE) {
		
    $result = $conn->query("SELECT status FROM users WHERE id=$id");

    $row = $result->fetch_assoc();

    echo $row['status'];
	} else {
	  echo "Error updating record: " . $conn->error;
	}
	
}
$conn->close();
?>