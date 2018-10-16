<!DOCTYPE html>

<style>
.img {
    position: relative;
    float: left;
    width:  100px;
    height: 100px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
}
</style>


<html>
	<head>
		<title>Image Upload</title>
	</head>
	<body>
		<form method="POST" action="upload.php" enctype="multipart/form-data">
		
		
		
			<?php
				// Create database connection
				$connectstr_dbhost = '';
				$connectstr_dbname = '';
				$connectstr_dbusername = '';
				$connectstr_dbpassword = '';
				 
				foreach ($_SERVER as $key => $value) {
					if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
						continue;
					}

					$connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
					$connectstr_dbname = 'inventory_manager_db';
					$connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
					$connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
				}
			 
				// Create connection
				$conn = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT UserNr, Name, ImageName FROM User";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "Name: $row[Name] <br>";
						echo "<div class=img style=background-image:url(https://1801674php.azurewebsites.net/uploads/" . $row['ImageName']. ");></div>";
						echo "<button type='submit' name='delete' value=$row[UserNr] >delete</button>";
						//echo "<img width='50px;' height='50px;' src='https://1801674php.azurewebsites.net/uploads/" . $row['ImageName']. "'><br>";
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
		
		
			<input type="file" name="file"><br>
			Name: <input type="text" name="name"><br>
			<button type="submit" name="submit">Upload</button>
		</form>
	</body>
</html>