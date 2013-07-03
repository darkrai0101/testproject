<?php

	include_once('config.php');
	include_once('AES.php');
	session_start();
	
	//$username = "trungpheng";
	//$type = 2;//0-check so gold; 1-Cong gold; 2-Tru gold
	//$value = 999;//$value = 800; //neu type = 1||2 thi co value # 0
	
	$username = $_SESSION['username'];
	$type = $_POST['type'];
	$value = $_POST['value'];
	
	$aes = new AES();
	$data = "start|".$username."|".$type."|".$value."|end#netstring";
	$data_encrypt = $aes->aes128Encrypt($KEY_AES, $data);
	$data_encrypt = base64_encode($data_encrypt);
	$data_encrypt = urlencode($data_encrypt);
	
	$url = $URL_HOST."?data=".$data_encrypt;
	//echo $url;//die;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	$result = json_decode(curl_exec($ch));
	echo $result;
	curl_close($ch);
	die;
?>