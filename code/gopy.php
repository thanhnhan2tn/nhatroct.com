<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include_once ('./include/head.php');
?>
<style type="text/css">
	
#container form {
		margin: 20px 20px 0px 20px;  
}

#container div#loading {
    position: absolute;
    top: 130px;
    right: 40px;
}

#container fo	rm div#success {
    border: 1px solid green;
    color: green;
    padding: 5px;
    width: 170px;
    margin-bottom: 10px;
    display: none;
}

#container form div#error {
    border: 1px solid red;
    color: #333;
    padding: 5px;
    width: 200px;
    margin-bottom: 10px;
    display: none;
}

#container form p {
		padding-bottom: 10px;  
}

#container form input[type=text],
#container form input[type=submit],
#container form input[type=email],
#container form input[type=password]

 {
 		width: 250px;
		height: 30px;
		font-family: Arial;
  	padding: 0px 10px;
}

#container form div.warning {
    border: 1px solid #777;
    padding: 5px;
    width: 200px;
    color: red;
    display: none;
}

#container form input#captcha {
		width: 205px;
		float: left; 
}

#container form img {
		margin: 0px 10px;
		border: 1px solid #A7A6AA;  
}

#container form img#img_captcha {
		float: left;  
}

#container form img#load_captcha {
		background: #fff;
		padding: 4px;  
  	margin: 0px;
    cursor: pointer;
}

#container form textarea {
		resize: none;
		width: 385px;
		height: 120px; 
  	padding: 10px;
  	font-family: Arial;
  	font-size: 14px;
}

#container form input[type="submit"] {
  	width: 120px;
  	font-weight: bold;
  	font-family: Arial;
 		border: 1px solid #A7A6AA;
  	background: -moz-linear-gradient(top,#fff,#d4d4d4);
  	background: -webkit-linear-gradient(top,#fff,#d4d4d4);
}

/* end phanhoi.php */
</style>
</head>
<body>
<!-- script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script -->
<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/on-scroll.js"></script>

<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>
  </header>
  <div id="main"  class="container">
	   <article>
			<!-- // Cột trái -->
	   <div id="left">
<?php 

require_once ('./include/mysqlConnect.php');
// Khai báo hàm xử lý cho chức năng gửi phản hồi
if(isset($_REQUEST['submit'])){
	echo '<div class="bs-callout bs-callout-info">';
	if($_SESSION['security_code'] == $_POST['captcha']) {
		
        $name = $mysqli->escape_string($_POST['name']);
        $email = $mysqli->escape_string($_POST['email']);
        $subject = $mysqli->escape_string($_POST['subject']);
        $content = strip_tags($_POST['content']);
 		$date = $mysqli->escape_string(date('d/m/Y'));
        $body = nl2br($content);
        
        

        $sql="INSERT INTO gopy(gopy_id, gopy_name,gopy_email, gopy_subject, gopy_noidung, gopy_date) 
        VALUES (NULL,'".$name."',"
        	."'" . $email . "',"
        	."'" . $subject . "'," 
        	."'" . $content . "'," 
        	."'" . $date . "')";          // date("Y") . "/" . date("m") . "/" . date("d") . "')";
		$result = $mysqli->query($sql)or die($mysqli->error()."Không kết nối được cơ sở dữ liệu, vui lòng gửi lại sau.");
 
       
        //echo $name . $email . $subject . $body . $date;
        echo '<div class="alert alert-success"><strong>Đã gửi thành công</strong></div>';
 
    } else {
        echo '<div class="alert alert-danger"><strong>Lỗi! </strong>Nhập mã bảo mật chưa đúng.</div>';
    }
    echo '</div>';
 }
 else{
?>

<script type="text/javascript" src="./js/AJAX.js"> // Khai báo sử dụng js 
</script>
<div id="container">
			<form method="POST" action="" >
<h3>Gửi góp ý, phản hồi</h3> 
				<p>
				<input type="text" id="name" name="name" placeholder="Nhập Họ và Tên" required>
				</p><div class="warning" id="nameError">Vui lòng nhập tên của bạn</div>
				<p><!-- Email -->
				<input type="email" id="email" name="email" placeholder="Nhập Email" required> <!-- Type = "Email" nếu người dùng nhập vào không đúng định dạng sẽ báo warning -->
				</p><div class="warning" id="emailError">Email không hợp lệ</div>
					<!-- End Email // warning khi khai báo không hợp lệ-->
				
				<input type="text" id="subject" name="subject" placeholder="Nhập tiêu đề" required>
				</p><div class="warning" id="subjectError">Vui lòng nhập tiêu đề</div>
					<!-- End Subkect -->
				<textarea id="content" name="content" placeholder="Nội dung..." required style="margin: 0px; width: 616px; height: 222px;"></textarea>
				</p><div class="warning" id="contentError">Vui lòng nhập nội dung</div>
					<!-- end Noi dung -->
				<p><!-- Start khung captcha --><input type="text" id="captcha" name="captcha" placeholder="Nhập vào mã bảo vệ" required alt="Security Code"><img src="./include/captcha.php" id="img_captcha"><a id="load_captcha" class="glyphicon glyphicon-refresh margin-10" title="Tải captcha khác"></a>
        <div class="warning" id="captchaError">Vui lòng nhập Captcha</div>
                </p> <!-- end khung captcha -->
				<p>
				<input type="submit" name="submit" id="Send" value="Gửi">
				</p>

			</form>
		</div> <!-- End container -->


<?php
	}
?>

</div> 
        	<!-- // End #left -->
        	<!-- // Cột phải -->
        <div id="right">
          
        </div>
     </article>
</div> <!-- END Container -->
</div> <!-- // End Wrapper -->
<footer>
<?php 
    include_once ('./template/footer.php');
?>
</footer>
</body>
</html>