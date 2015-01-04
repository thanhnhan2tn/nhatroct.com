<?php  

/*
<!-- header, menu, login,... -->
Coder: Thai Thanh Nhan
Info
    - Email: thanhnhan2tn@mail.com
    - SĐT: 0939 87 00 77
*/
@ob_start();
if(!isset($_SESSION))
  session_start();
?>
<div id="header">
	<div class="top-head">
    	<div class="left-top-head">
        <span class="logo"></span>
      </div>
      <div class="right-top-head">
      <?php
      if(isset($_SESSION['group'])&&($_SESSION['group']==3)){ echo '<div class="login-form"><a href="./admin">[Khu quản lý]</a></div>';}
      ?>   
              <div class="login-form">
      <?php

      if(!isset($_SESSION['user_name']) && isset($_COOKIE['user_name'])){
          $_SESSION['user_name'] = $_COOKIE['user_name'];
        }
      if (isset($_SESSION['user_name'])) {
          $username = $_SESSION['user_name'];
          echo '<span class="welcome">Xin chào <b><i>'.$username.'</i></b>,</span><a href="./profile.php" class="">Thông tin cá nhân</a>|<a href="./post-info.php" class="">Đăng tin</a>|<a href="./login.php?logout" class="">Thoát</a> ';
      }
      else{
      ?>
              <a href="#login" class="login">Đăng nhập</a>|<a href="./reg.php" class="register">Đăng kí</a>
      <?php 
      }
      ?>
        </div>

            <div class="overlay" id="login"></div>
            <div class="popup">
           <form action="./login.php" method='post'>
                <label>Tên tài khoản:</label>
                    <input type="text" class="inputname" name='username' placeholder="Tên tài khoản, số điện thoại hoặc email" required>
                <label>Mật khẩu:</label>
                    <input type="password" class="inputpass" name='password' placeholder="Mật khẩu" required>
                <div id="remember" class="remember">
                    <label for="cb_cookieuser_navbar"><input type="checkbox" name="checkbox" value="1"> Ghi nhớ?</label>
                <a href="./lostpw.php" rel="nofollow" class="forgotbutton margin-5">Bạn quên mật khẩu ?</a>
                </div>
                    <div class="actionbutton">
                      <input type='submit' name='submit' value='Đăng Nhập' />
                      <input type="reset" name="reset" value="Huỷ"/><br />
                </div>
            </form>
            <a class="close-box" href="#"></a>
            </div>
            

        </div> <!-- END RIGHT TOP HEAD -->  
  </div> <!-- END TOP HEAD -->
    
  <div class="top-menu">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand active" href="./"><span class="glyphicon glyphicon-home"></span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class=" "><a href="./?TinDang=1&type=Cho-Thue">Cho thuê</a></li>
              <li><a href="./?TinDang=2&type=Share-Phong">Share Phòng</a></li>
              <li class="dropdown"></li>
            </ul>
          <?php 
      if (isset($_SESSION['user_name'])) {
          $username = $_SESSION['user_name'];
          echo '<ul class="nav navbar-nav right login-box">
                  <li><a href="./profile.php" class="">Thông tin cá nhân</a></li>
                  <li><a href="./post-info.php" class="">Đăng tin</a></li>
                  <li><a href="./login.php?logout" class="">Thoát</a></li>
                  </ul>';
      }
      else{
          ?>
            <ul class="nav navbar-nav right login-box">  
              <li><a href="#login" class="login">Đăng nhập</a></li>
              <li><a href="reg.php" class="register">Đăng kí</a></li>
            </ul>
      <?php
          }
      ?>
         <div class="navi ">
<?php 
    require_once ('./include/mysqlConnect.php');
    include ('./include/search.php');
  ?>
          </div>
              <!-- 
                <input type="text" class="left" placeholder="Tài khoản" required>
                <input type="password" class="left" placeholder="Mật khẩu" required>
                <button type="submit" name="submit" style="padding: 1px 5px;">OK</button>
                / -->
              
            

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
  </div> <!--End Top menu -->
   
</div> <!-- END headẻr -->