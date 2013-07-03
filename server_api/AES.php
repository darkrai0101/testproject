<?php
/*
*  Author: Cody Phillips
*  Company: Phillips Data
*  Website: www.phpaes.com, www.phillipsdata.com
*  File: AES.class.php
*  October 1, 2007
*
*  This software is sold as-is without any warranties, expressed or implied,
*  including but not limited to performance and/or merchantability. No
*  warranty of fitness for a particular purpose is offered. This script can
*  be used on as many servers as needed, as long as the servers are owned
*  by the purchaser. (Contact us if you want to distribute it as part of
*  another project) The purchaser cannot modify, rewrite, edit, or change any
*  of this code and then resell it, which would be copyright infringement.
*  This code can be modified for personal use only.
*
*  Comments, Questions? Contact the author at cody [at] wshost [dot] net
*/

class AES {
	function aes128Encrypt($key, $data) {
		$block = mcrypt_get_block_size('rijndael_128', 'ecb');
		$pad = $block - (strlen($data) % $block);
		$data .= str_repeat(chr($pad), $pad);
		return (mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB));
	}
//	function aes128Encrypt($key, $data) {
//		if(16 !== strlen($key)) $key = hash('MD5', $key, true);
//		$padding = 16 - (strlen($data) % 16);
//		$data .= str_repeat(chr($padding), $padding);
//		return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
//	}
//	function aes256Encrypt($key, $data) {
//		if(32 !== strlen($key)) $key = hash('SHA256', $key, true);
//		$padding = 16 - (strlen($data) % 16);
//		$data .= str_repeat(chr($padding), $padding);
//		return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
//	}
	function aes128Decrypt($key, $data) {
		//$data = base64_decode($str);
		$data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB);
		$block = mcrypt_get_block_size('rijndael_128', 'ecb');
		$pad = ord($data[($len = strlen($data)) - 1]);
		$len = strlen($data);
		$pad = ord($data[$len-1]);
		return substr($data, 0, strlen($data) - $pad);
	}
//	function aes128Decrypt($key, $data) {
//		if(16 !== strlen($key)) $key = hash('MD5', $key, true);
//		$data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
//		$padding = ord($data[strlen($data) - 1]);
//		return substr($data, 0, -$padding);
//	}
//	function aes256Decrypt($key, $data) {
//		if(32 !== strlen($key)) $key = hash('SHA256', $key, true);
//		$data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
//		$padding = ord($data[strlen($data) - 1]);
//		return substr($data, 0, -$padding);
//	}
}