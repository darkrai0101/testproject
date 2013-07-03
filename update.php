<?php

	require_once('sql.php');
	session_start();	
	$username = $_SESSION['username'];
	$resultArray = explode(":",$_POST["data"]);
	$star = $resultArray[0];
	$score = $resultArray[1];
	$tools = $resultArray[2];
	$update = "UPDATE username SET
	star = '$star',
	score = '$score',
	tools = '$tools'
	WHERE username ='".$username."'";
			
	$results = mysql_query($update)
			or die(mysql_error());
?>
