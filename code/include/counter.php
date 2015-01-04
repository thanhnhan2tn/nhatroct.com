<?php
	//counter

require_once ('mysqlConnect.php');
$time_now = time();    // lưu thời gian hiện tại
$time_out = 60; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
$ip_address = $_SERVER['REMOTE_ADDR'];    // lưu lại IP của kết nối
//require_once('connect.php');    // nhúng file kết nối CSDL vào
// kiểm tra xem thời gian hiện tại so với lần truy cập cuối có lớn hơn khoảng thời gian chờ không    
//- nếu không thì thôi    
//- nếu có thì thêm vào như là một kết nối mới
$first=$mysqli->query("SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'");
if(!$first->num_rows){
   $mysqli->query("INSERT INTO `counter` VALUES ('$ip_address', NOW())");
}
// đếm số người đang online
$online = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now")->num_rows;
// đếm số người ghé thăm trong ngày (từ 0h ngày hôm đó đến thời điểm hiện tại)// z- là số thứ tự ngày trong năm, năm đây là năm có 365 ngày
$day = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 1) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm ngày hôm qua// . (date('z') +1+ 0) .  =  . (date('z') + 1 ) .  =>  . (date('z') + 1 - 1 ) . = . (date('z') + 0) .// lùi lại 1 ngày nên trừ đi 1
$yesterday = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 0) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;

// đếm số người ghé thăm trong tuần (từ 0h ngày thứ 2 đến thời điểm hiện tại)

$week = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm tuần rồi//.date('W') . =. (date('W') ). =. (date('W') + 0 ).  => . (date('W') + 0 -1 ). . (date('W')  -1 ). // lùi lại 1 tuần nên trừ 1
$lastweek = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE WEEKOFYEAR(`last_visit`) = " . (date('W') -1 ) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;

// đếm số người ghé thăm trong tháng
$month = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm trong năm
$year = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm tổng số người đã ghé thăm
$visit = $mysqli->query("SELECT `ip_address` FROM `counter`")->num_rows;

?>