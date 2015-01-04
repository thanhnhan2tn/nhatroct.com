<?php 
//config
//
$main_url = 'localhost/Dropbox/LapTrinhWeb/code/ktweb';  // dia chi thu muc hien hanh cua website khong có http:// và / ở cuối
//
define("MYSQL_HOST","localhost");
define("MYSQL_USER","root");
define("MYSQL_PASS","");
define("MYSQL_DB","csdl_n8");
$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
$mysqli->set_charset("utf8");
?>
