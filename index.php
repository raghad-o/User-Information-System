<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Users Information</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>User Information</h1>
		<p>Add a new user using the form below.</p>
		<form action = "process.php" method = "post">
			<label for="name">Name:</label>
			<input type="text" name="name">
			<label for="age">Age:</label>
			<input type="number" name="age">
			<input type = "submit" value = "Submit" name="submit">
		</form>
		<br> 
		
		<table> 
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>status</th>
				<th>Action</th>
			</tr>
			

			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "mydb";

				$conn = mysqli_connect($servername, $username, $password, $dbname);
				
				if (!$conn) {
				  die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT id, name, age, status FROM users";
			
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					
				  while($row = mysqli_fetch_assoc($result)) {
					echo "<tr> 
							<td>" . $row["id"]. " </td>
							<td>" . $row["name"]. "</td>
							<td>" . $row["age"]. "</td>
							<td id='status".$row["id"]."'>" . $row["status"]. "</td>
							<td>
							<button type='button' onclick='toggleStatus(". $row["id"].")'>Toggle</button>
							</td>
							</tr>";
				  }
				} else {
				  echo "<tr>
						<td colspan='5'>No records found</td>
						</tr>";
				}
				mysqli_close($conn);
			?>
		</table>
		<script src="script.js"></script>
	</body>
</html> 