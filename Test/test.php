<?php
	###############
	#DB Connection#
	###############
	
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

	// Output of some Data from the DB
	$sql = "SELECT * from User";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row['UserNr']. " - Name: " . $row['Name']. " " . $row['Text']. "<br>";
		}
	} else {
		echo "0 results";
	}
	
	// FTP Access
	$ftp_server = 'ftp://waws-prod-am2-223.ftp.azurewebsites.windows.net';
	$ftp_user = '1801674PHP\user1801674';
	$ftp_pass = 'Blumenbeet1';

	//dateinamen
	$local_file = 'test1.jpg';
	$server_file = 'test1.jpg';

	$connection_id = ftp_connect($ftp_server);
	//logindaten werden übergeben
	$login_result = ftp_login($connection_id, $ftp_user, $ftp_pass);

	/*ftp_pasv($connection_id,true);

	if (ftp_get($connection_id, $local_file, $server_file, FTP_BINARY)) {
		echo $local_file .' wurde erfolgreich überschrieben<br />';
		} else {
		echo "Ein Fehler ist aufgetreten\n";
	}*/
		
	
	ftp_close($connection_id);
	$conn->close();
?>