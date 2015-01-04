<?php 

session_start();
if(isset($_SESSION['user_name']) && $_SESSION['group'] == 3)
{
include ('./template/header.php');
?>

	<script language=JavaScript>
	function docheck(status,from_)
	{
		var alen=document.frmList.elements.length;
		
		alen=(alen > 5)?		
			document.frmList.check_id.length:0;
		if(alen > 0)
		{
			for(var i=0;i<alen;i++)
			document.frmList.check_id[i].checked=status;
		}
		else
		{
			document.frmList.check_id.checked=status;
		}
		if(from_>0)
			document.frmList.check_all.checked=status;
	}
	function docheckone(){
		var alen=document.frmList.elements.length;
		
		var isChecked=true;
		alen =(alen > 5)?
		document.frmList.check_id.length:0;
		if(alen >0)
		{
			for(var i=0;i<alen;i++)
				if(document.frmList.check_id[i].checked==false)isChecked=false;
		}
		else
		{
			if(document.frmList.check_id.checked==false)isChecked=false;	
		}
		document.frmList.check_all.checked=isChecked;	
	}
	
	function demchon(){
		var strchon="";
		var alen=document.frmList.elements.length;
		
		alen= (alen >5) ? document.frmList.check_id.length:0;
		if(alen > 0)
		{
			for(var i=0;i< alen;i++)
			if(document.frmList.check_id[i].checked== true)
			strchon += document.frmList.check_id[i].value+",";
		}else
		{
			if(document.frmList.check_id.checked==false)
			strchon=document.frmList.check_id[i].value;
		}
		document.frmList.chon.value==strchon;
		
	}
	function checkInput()
	{
		var alen=document.frmList.elements.length;
		var isChecked =false;
		alen = (alen >5)? document.frmList.check_id.length: 0;
		if(alen >0)
		{
			for(var i=0;i<alen;i++)
			if(document.frmList.check_id[i].checked==true)isChecked=true;
		}else{
			if(document.frmList.check_id.checked==true)isChecked=true;
		}
		if(!isChecked)	alert("Chưa chọn người dùng để sửa đổi");
		else 			demchon();
		return isChecked;
	}
	</script>

    <!-- bat dau Thân trang web -->
<div id="wrap">  
  <div class="left_col">
    <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  <a href="#nav" class="nav-toggle" aria-hidden="true">Menu</a>
  </div>
        
  <div role="main" class="main">
		<div class="quanlynguoidung">
			<form name="frmList" action="" method="post" onsubmit="return checkInput();">
	<table>
	<tr>
		<td width="5%">
		<input type="checkbox" name="check_all" value="0" onclick="docheck(document.frmList.check_all.checked,0);">
		</td>
		<td width="15%"><b>User Name</b></td>
		<td width="20%"><b>Full Name</b></td>
		<td width="10%"><b>Phone 	</b></td>
		<td width="5%"><b>Sex		</b></td>
		<td width="5%"><b>Year	 	</b></td>
		<td width="5%"><b>Level	    </b></td>
		<td width="15%"><b>Email	</b></td>
	</tr>
	<?php
		require_once '../include/mysqlConnect.php';
		$result = $mysqli->query("SELECT * FROM users");
			
			while($row=$result->fetch_array()){ 
	?>
	<tr>	
		<td width="5%">
		<input type="checkbox" name="check_id" value="<?php echo $row['user_name'];?>" onclick="docheckone();">
		</td>
		<td width="15%"><?php echo $row['user_name'];	  ?></td>
		<td width="20%"><?php echo $row['user_fullname']; ?></td>
		<td width="10%"><?php echo $row['user_sdt'];	  ?></td>
		<td width="5%"><?php  if($row['user_gioitinh']==1) echo "Nam"; else echo"Nữ";?></td>
		<td width="5%"><?php  echo $row['user_namsinh'];   ?></td>
		<td width="5%"><?php  if($row['group_id']==1) echo "Admin";    else echo"User";?></td>
		<td width="15%"><?php echo $row['user_email'];    ?></td>
		<?php
		echo "<td><a href='update-user.php?edit=$row[user_name]'>Edit</a></td>";
		echo "<td><a href='update-user.php?del=$row[user_name]'>Del </a></td>";
		?>
	</tr>
	<?php
		}
	$mysqli->close();	
	?>
	</table>
	<input type="hidden" name="chon"/>
	<input type="submit" value="Update"/>
	<input type="submit" value="Delete" href="deleteuser.php"/>
	<input class="button" type="reset"  value="Reset"/>
</form>
		</div>

        </div> <!-- end Right -->
    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
</div><!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->
<?php
//include ('template/footer.php');
}else{
  header('location: index.php');
}
?>

</body>
</html>