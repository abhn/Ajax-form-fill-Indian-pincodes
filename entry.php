<?php
	$file = fopen("pincodes.csv", "r") or die("Open file");
	$server = "localhost";
	$username = "root";
	$password = "password";
	$db = "turnouts";
	$conn = mysql_connect($server, $username, $password);
	mysql_select_db("turnouts") or die();
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	while(!feof($file)) {
		$line = fgets($file);
		$words = explode(",", $line);
		$pincode = $words[1];
		$taluka = $words[7];
		$district = $words[8];
		$state = $words[9];
		$sql = "INSERT INTO pincode (pincode, taluka, district, state) VALUES ('$pincode', '$taluka', '$district', '$state')";
		mysql_query($sql, $conn);
		mysql_error($conn);
	}
	fclose($file);
	mysql_close($conn);
?>
