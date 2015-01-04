<meta charset='unicode'>
<?php
/*
Thai Thanh Nhan
Function - chua cac ham chuc nang
 */

	//include_once 'conf.php';
	require_once 'mysqlConnect.php';
	// $mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
	// $mysqli->set_charset("utf8");
	//mysql_select_db( $dbName, $conn);
function anti_sql($sql) {
    $sql = str_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|*|--|\)/"),"",$sql);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}	

function removesign($str){	
		$coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ"
		,"ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ","ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
		,"ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
		,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
		,"Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ","ê","ù","à"," ");
		$khongDau=array("a","a","a","a","a","a","a","a","a","a","a"
		,"a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o"
		,"o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d",
		"A","A","A","A","A","A","A","A","A","A","A","A"
		,"A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O"
		,"O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","e","u","a","-");
return str_replace($coDau,$khongDau,$str);
    }  //end removesign

function m_htmlchars($str) {
	return str_replace(
		array('&', '<', '>', '"', chr(92), chr(39)),
		array('&amp;', '&lt;', '&gt;', '&quot;', '&#92;', '&#39'),
		$str
	);
}
function upload_img($file){
	$errors=0;
	// Nếu nó không rỗng
	if (isset($file['name'])){
	$file['name'] = removesign($file['name']);
	//$file['name']=str_replace(' ','-',$file['name']);
	// Lấy tên gốc của file
	$ngaydang = Date("sHidmY");
	$image=$ngaydang.$file['name'];
	$filename = $ngaydang.stripslashes($file['name']);
	//Lấy phần mở rộng của file
	// Nếu nó không phải là file hình thì sẽ thông báo lỗi
	if (($file["type"] != "image/gif") && ($file["type"] != "image/jpeg") && ($file["type"] !=
	"image/jpg") && ($file["type"] != "image/png")){
	// xuất lỗi ra màn hình
	echo '<script>alert("Đây không phải là file hình ảnh");</script>';
				echo '<script>window.history.back();</script>' ;
	$errors=1;
	}
	else{
	//Lấy dung lượng của file upload
	$size=filesize($file['tmp_name']);
	if ($size > 300*1024)
	{
		
		echo '<script>alert("Vượt quá dung lượng cho phép!");</script>';
				echo '<script>window.history.back();</script>' ;
	$errors=1;
	}
	// đặt tên mới cho file hình up lên
	//$image_name=time().'.'.$file["type"];
	// gán thêm cho file này đường dẫn
	$newname='./images/'.$filename;

	// kiểm tra xem file hình này đã upload lên trước đó chưa
	$copied = copy($file['tmp_name'], $newname);
		
	if (!$copied)
	{
		echo '<script>alert("File hình này đã tồn tại, hoặc không thể upload lên server!.");</script>';
				echo '<script>window.history.back();</script>' ;
	
	$errors=1;
		}
	}
	return $newname;
	}
	
} // upload_img

function duong(){
			$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
			$mysqli->set_charset("utf8");
				
				$sql_duong = sprintf('SELECT duong_id,duong_name FROM duong;');
				$rs3=$mysqli->query($sql_duong);
				$op_duong="";
					while($rows=$rs3->fetch_array()){
				$op_duong.="<option value='".$rows['duong_id']."'>{$rows['duong_name']}</option>";
		}
		return $op_duong;
} // district
function phuong(){
			$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
			$mysqli->set_charset("utf8");
				$sql_phuong = sprintf('SELECT phuong_id,phuong_name FROM phuong;');
				$rs2=$mysqli->query($sql_phuong);
					$op_phuong="";
					while($rows=$rs2->fetch_array()){
					$op_phuong.="<option value='".$rows['phuong_id']."'>".$rows['phuong_name']."</option>";
				}
		return $op_phuong;
}
function quan(){
	$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
	$mysqli->set_charset("utf8");
	$sql_quan = sprintf('SELECT quan_id,quan_name FROM quan;');
				$rs1=$mysqli->query($sql_quan);
				$op_quan="";
					while ($rows = $rs1->fetch_array()){
					$op_quan.="<option value='".$rows['quan_id']."'".(($rows['quan_id']==1)?'selected=selected':'').">".$rows['quan_name']."</option>";
				}
	return $op_quan;
}

// lay dac diem
function get_dacdiem($id){
	$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB) or die ($mysqli->connect_error);
	$mysqli->set_charset("utf8");
	//$id = $mysqli->escape_string($id);
	$sql_dd = "SELECT dacdiem from dacdiem where iddacdiem='".$id."'";
	$rs=$mysqli->query($sql_dd);
	$rows=$rs->fetch_array();
	return $rows[0];
}

function getCurrentPageURL() {
    $pageURL = 'http';
    if (!empty($_SERVER['HTTPS'])) {if($_SERVER['HTTPS'] == 'on'){$pageURL .= "s";}} 
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function count_sql($dem){
	@$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
	$dem = $mysqli->escape_string($dem);
	$sql_dem="SELECT count(*) FROM `".$dem."`";
	$rs=$mysqli->query($sql_dem)->fetch_row();
	return $rs[0];
}