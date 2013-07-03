<?php
	$connect = mysql_connect("localhost", "root", "")
		or die("Lỗi không kết nối được đến sever!".mysql_error());
	mysql_select_db("pikachu")
		or die(mysql_error());
?>