<?php
	$pincode = $_GET['pincode'];
	$conn = mysql_connect("localhost", "root", "password");
	mysql_select_db("turnouts") or die();
	
	$pincode = (string)mysql_real_escape_string($pincode);
	
	$sql = "SELECT taluka, district, state FROM pincode WHERE pincode = '$pincode'";
	$data = mysql_query($sql);
	if(!$data) {
		die(mysql_error());
	}
	$row = mysql_fetch_row($data);
	$taluka = $row[0];
	$district = $row[1];
	$state = $row[2];
	$state = str_replace("\r\n", "", $state);
	$taluka = strtolower($taluka);
	$district = strtolower($district);
	$state = strtolower($state);
	header('Content-type: application/json');
	$array = array('taluka'=>$taluka, 'district'=>$district, 'state'=>$state);
	echo json_encode($array);
?>
