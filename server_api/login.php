<?php
/********** LOGIN & LOGOUT ***********/
include_once('config.php');
session_start();

if($_REQUEST['token']!="" && $_REQUEST['token'] != null){
	$_SESSION['gameid'] = $_REQUEST['gameid'];
	
	if(!isset($_SESSION['username'])){
		$token = $_REQUEST['token'];
		$url = $URL_HOST_LOGIN."?token=".$token;
		$checkResult = file_get_contents($url);
		$resultArray = explode("|",$checkResult);
			if ($resultArray[0]=="1"){
				session_start();
				$_SESSION['username'] = $resultArray[1];
			};
	}
}else{
		session_start();
		//huy cac bien ca session
		$_SESSION=array();
		//huy toan bo cac session
		session_destroy();
}
/********** END - LOGIN & LOGOUT ***********/
?>