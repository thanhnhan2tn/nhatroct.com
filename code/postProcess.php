<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php
ob_start();
if(!isset($_SESSION)) 
 		session_start();

      if(!isset($_SESSION['user_name']) && isset($_COOKIE['user_name'])){
          $_SESSION['user_name'] = $_COOKIE['user_name'];
        }elseif (!isset($_SESSION['user_name']) && (!isset($_COOKIE['user_name']))){
        	header("Location: ./login.php");
        }
        $username = $_SESSION['user_name']; 

	if(($_POST['nhatro-type']!=null) ||($_POST['title']!='')|| ($_POST['sonha']!='')
		||($_POST['sonha']!='') ||($_POST['cost']!='')||($_POST['ten']!='')||($_POST['ContactPhone1']!=''))
		{
			require_once './include/function.php';
			 
			($_FILES['img1']['error']==0) ? ($img1 = upload_img($_FILES['img1'])): $img1 = '';
			($_FILES['img2']['error']==0) ? ($img2 = upload_img($_FILES['img2'])): $img2 = '';
			($_FILES['img3']['error']==0) ? ($img3 = upload_img($_FILES['img3'])): $img3 = '';
			
			$nhatro_img = $img1.", ".$img2.", ".$img3; 
			$nhatro_type = $mysqli->escape_string($_POST['nhatro-type']);
			//($_POST['nhatro-type']);
			$nhatro_name = $mysqli->escape_string($_POST['title']);
			//$username;
			$nhatro_dientich = $mysqli->escape_string($_POST['dientich']);
			$phuong_id=$mysqli->escape_string($_POST['option-phuong']);
			$duong_id=$mysqli->escape_string($_POST['option-duong']);
			//if(isset($_POST['option-quan'])){ $quan_id=($_POST['option-quan']); }
			$detail = $_POST['detail'];
			$nhatro_dacdiem='';
			foreach ($detail as $key) {
				$nhatro_dacdiem = $nhatro_dacdiem.', '.$key;
			}

			$nhatro_mota = $mysqli->escape_string($_POST['Detail-more']);
			$nhatro_sdt = $mysqli->escape_string($_POST['ContactPhone1'].",".$_POST['ContactPhone2']);
			$nhatro_diachi = $mysqli->escape_string($_POST['sonha']);
			$nhatro_gia = $mysqli->escape_string($_POST['cost'])*1000;
			//$nhatro_conphong=1; // mac dinh khi moi dang conphong=true
			$nhatro_soluong = $mysqli->escape_string($_POST['soluong']);
			// set the default timezone to use. Available since PHP 5.1
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$ngaydang = Date("Y-m-d H:i:s");;
			//$nhatro_trangthai =1; // mặc dinh khi mới đăng trạng thái mở
			
			$nhatro_lienhe = $mysqli->escape_string($_POST['ten']);
			if(isset($_POST['email-tro'])){$nhatro_email = $mysqli->escape_string($_POST['email-tro']);}
			if(isset($_POST['ContactPhone1'])){$nhatro_sdt2 = $mysqli->escape_string($_POST['ContactPhone1']);}
			 		
		// insert csdl
		require_once './include/mysqlConnect.php';
if(isset($_POST['Submit'])){		
		$insert_nhatro = "
			INSERT INTO `csdl_n8`.`nhatro` (`nhatro_id`, `nhatro_name`, `nhatro_type`, `user_name`, `duong_id`, `phuong_id`,`nhatro_dientich`, `nhatro_dacdiem`, `nhatro_mota`, `nhatro_sdt`,`nhatro_lienhe`, `nhatro_diachi`, `nhatro_gia`, `nhatro_soluong`, `ngaydang`,`nhatro_img`) 
			VALUES (NULL, '".$nhatro_name."', '".$nhatro_type."', '".$username."', '".$duong_id."','".$phuong_id."', '".$nhatro_dientich."', '"
				.$nhatro_dacdiem."', '"
				.$nhatro_mota."', '".$nhatro_sdt."','".$nhatro_lienhe."', '".$nhatro_diachi."', '".$nhatro_gia."', '".$nhatro_soluong."', '".$ngaydang."','".$nhatro_img."');
			";
}elseif(isset($_POST['edit'])){
		$id=$mysqli->escape_string($_REQUEST['id']);
		$insert_nhatro = "
			UPDATE `csdl_n8`.`nhatro` SET `nhatro_name`='".$nhatro_name."'
				, `nhatro_type`='".$nhatro_type."'
				, `user_name`='".$username."'
				, `duong_id`='".$duong_id."'
				, `phuong_id`='".$phuong_id."'
				,`nhatro_dientich`='".$nhatro_dientich."'
				, `nhatro_dacdiem`='".$nhatro_dacdiem."'
				, `nhatro_mota`='".$nhatro_mota."'
				, `nhatro_sdt`= '".$nhatro_sdt."'
				,`nhatro_lienhe`='".$nhatro_lienhe."'
				, `nhatro_diachi`='".$nhatro_diachi."'
				, `nhatro_gia`='".$nhatro_gia."'
				, `nhatro_soluong`='".$nhatro_soluong."'
				, `ngaydang`='".$ngaydang."'
				,`nhatro_img`='".$nhatro_img."' 
				WHERE nhatro_id='".$id."';
			";		
}		
		$rs = $mysqli->query($insert_nhatro);

		if($rs ==1 ){
			 echo "<script>alert('Đã đăng thông tin thành công!');window.location.assign('./index.php');</script>";
}
	 //end submit
	 else{
		echo $insert_nhatro; 
		echo "<script>alert('Thông tin chưa đúng!');window.history.go(-1);</script>";
		
	}
}
?>

</body>
</html>