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
	$db = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);
	// Check connection
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}

	// If upload button is clicked ...
	if (isset($_POST['delete'])) {
		$deleteButton = $_POST['delete'];
		print_r($deleteButton);
		/*
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		
		$userName = $_POST['name'];
		
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		$allowed = array('jpg', 'jpeg', 'png', 'gif', 'svg', 'pdf');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'uploads/'.$fileNameNew;

					$sql = "INSERT INTO User (UserNr, Name, ImageName, ImageExtension)
					VALUES (Null, '$userName', '$fileNameNew', '$fileActualExt')";

					if ($db->query($sql)) {
						move_uploaded_file($fileTmpName, $fileDestination);
					} else {
						echo "databas upload did not work!";
					}
					
					
					
					header("Location: index.php?uploadsuccess");
					
				} else {
					echo "Your file is too big!";
				}
				
			} else {
				echo "There was an error uploading your file!";
			}
		} else {
			echo "You cannot upload files of this type!";
		}*/
	}
	
?>