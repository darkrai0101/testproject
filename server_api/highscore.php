<?php
	include_once('config.php');
	include_once('AES.php');
	session_start();
	$username = $_SESSION['username'];
	$gameid = $_SESSION['gameid'];
	$datatopost = $_POST["data"];
	
	$aes = new AES();
	$data = "start|".$username."|".$gameid."|".$datatopost."|end#netstring";
	$data_encrypt = $aes->aes128Encrypt($KEY_AES, $data);
	$data_encrypt = base64_encode($data_encrypt);
	$data_encrypt = urlencode($data_encrypt);
	$url = $URL_HOST_SCORE."?data=".$data_encrypt;
	
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	$result = json_decode(curl_exec($ch));
	echo $result;
	curl_close($ch);
	die;
?>