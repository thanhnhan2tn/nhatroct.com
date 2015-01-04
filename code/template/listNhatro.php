<?php  
/*
// File list nhà trọ ra ngoài trang chủ
Coder: Thai Thanh Nhan
Info
    - Email: thanhnhan2tn@mail.com
    - SĐT: 0939 87 00 77
*/

//require './include/mysqlConnect.php'
?>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var left_h = $("#left").height();             // Set chieu cao ít nhất cho list nhà trọ lấy từ left
    $(".list_nhatro").css('height', left_h-100);
    //alert (left_h);
  });
</script>
<div class="list_nhatro">
<ul class="item">
<?php 
    require_once('./include/mysqlConnect.php');
    require_once('./include/function.php');
    // xác định bao nhieu ô
    $display = 16;
    // tinh tong so trang can hien thi
if(isset($_GET['page']) && (int)$_GET['page']){
        $page = $_GET['page'];
    }else{ // neu chua xd thi tim sc trang
      $query ="SELECT COUNT(nhatro_id) FROM nhatro";
      $res = $mysqli->query($query) or die ('khong the ket noi');
      $rows = $res->fetch_array(MYSQLI_NUM);
      $record = $rows[0];
      if($record > $display){
        $page = ceil($record/$display);  // ceil làm tròn số lên
      } else{
        $page = 1;
      }
    } // end else
    $start = (isset($_GET['start']) && (int)$_GET['start'] >=0) ? $_GET['start'] : 0;
  
      // nếu timd ang duoc check
if(isset($_REQUEST['TinDang'])){
    $tindang= $mysqli->escape_string($_REQUEST['TinDang']);
    $sql = "SELECT * FROM nhatro,duong,phuong
            WHERE (nhatro_type ='".$tindang."'
                   AND nhatro.phuong_id = phuong.phuong_id)
                   AND nhatro.duong_id = duong.duong_id
                   ORDER BY nhatro_id DESC  LIMIT $start, $display";
}
//neu so luong duoc check:
  elseif(isset($_REQUEST['phongngu'])){
    $soluong =($_REQUEST['phongngu']);
    $sql = "SELECT * FROM nhatro as n,duong as d,phuong as p 
            WHERE n.phuong_id = p.phuong_id AND nhatro_soluong='".$soluong."'
            ORDER BY ngaydang desc LIMIT $start, $display";
  }
  //chua check phuong_id = '".$phuong_id."'
  elseif((isset($_REQUEST['duong']))&&(isset($_REQUEST['phuong']))){
    $phuong_id = $mysqli->escape_string($_REQUEST['phuong']);
      $duong_id = $mysqli->escape_string($_REQUEST['duong']);
      $sql = "SELECT * FROM nhatro as n ,phuong as p,duong as d
              WHERE (n.duong_id = '". $duong_id."'
                AND n.phuong_id = '". $phuong_id."'
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
              ORDER BY ngaydang desc LIMIT $start, $display";
    }
  elseif(isset($_REQUEST['phuong'])){
      $phuong_id = $mysqli->escape_string($_REQUEST['phuong']);
      $sql = "SELECT * FROM nhatro as n ,phuong as p,duong as d
              WHERE (n.phuong_id = '". $phuong_id."'
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
              ORDER BY ngaydang desc LIMIT $start, $display";
  }
  //chua check duong_id = '".$duong_id."'
    elseif(isset($_REQUEST['duong'])){
      
      $duong_id = $mysqli->escape_string($_REQUEST['duong']);
      $sql = "SELECT * FROM nhatro as n ,phuong as p,duong as d
              WHERE (n.duong_id = '". $duong_id."'
      
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
              ORDER BY ngaydang desc LIMIT $start, $display";
  }

// sort theo gia
  elseif(isset($_REQUEST['khoang-gia'])){
    $gia = $_REQUEST['khoang-gia'];
    switch ($gia) {
      case '0#500000': //neu gia duoi 500k
        $sql ="SELECT * FROM  nhatro as n, duong as d, phuong as p
                WHERE (nhatro_gia <500000
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
                ORDER BY ngaydang desc  limit $start, $display";
        break;
      case '500000#1000000': //neu gia khoang 500k-1000k
        $sql ="SELECT * FROM nhatro as n ,phuong as p,duong as d
                WHERE (nhatro_gia >= 500000 and nhatro_gia< 1000000
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
               ORDER BY ngaydang desc LIMIT $start, $display";
        break;
      case '100001#1500000': //neu gia khoang tren 1000k-1500k
        $sql ="SELECT * FROM nhatro as n ,phuong as p,duong as d
                WHERE (nhatro_gia >= 1000000 and nhatro_gia< 1500000
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
               ORDER BY ngaydang desc LIMIT $start, $display";
        break;
      case '1500001#2000000': //neu gia khoang tren 1500k-2000k
        $sql ="SELECT * FROM nhatro as n ,phuong as p,duong as d
                WHERE (nhatro_gia >= 1500000 and nhatro_gia< 2000000
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
               ORDER BY ngaydang desc LIMIT $start, $display";
        break;
      case '2000000#0': //neu gia tren 2000k
        $sql ="SELECT * FROM nhatro as n ,phuong as p,duong as d
                WHERE (nhatro_gia >= 2000000
                AND n.phuong_id = p.phuong_id
                AND n.duong_id = d.duong_id)
               ORDER BY ngaydang desc LIMIT $start, $display";
        break;
      default:
        $sql ="SELECT * FROM nhatro as n ,phuong as p,duong as d
                WHERE n.phuong_id = p.phuong_id
                  AND n.duong_id = d.duong_id)
               ORDER BY ngaydang desc LIMIT $start, $display";
        break;
    }

 } // sort theo gia
//KQ hien thi khi chua co doi tuong nao dc chon
  else{
    $sql = "SELECT * FROM nhatro, duong ,phuong 
            WHERE (nhatro.phuong_id = phuong.phuong_id
                    AND nhatro.duong_id = duong.duong_id
                  )
            ORDER BY ngaydang
            LIMIT $start, $display";
  }

$result = $mysqli->query($sql) or die ('Khong the ket noi');
if($result->num_rows==0){
  echo 'Chưa có nhà trọ nào!';
}else{
  while ($set = $result->fetch_array()){
    $nhatro_id=$set['nhatro_id'];
    $nhatroname = $set['nhatro_name'];
    $nhatromota = $set['nhatro_mota'];
    $nhatrotype = $set['nhatro_type'];
    $nhatro_gia = $set['nhatro_gia'];

    $img = explode(", ",$set['nhatro_img']);
    $thumb='';
    if ($img[0]!='') {
      $thumb.=$img[0];
    }else{
      $thumb.='./template/img/default.png';
    }


    // xu li dac diem
    $nhatro_dacdiem = explode(", ",$set['nhatro_dacdiem']);
    $list_item='';
    if(count($nhatro_dacdiem)<5){
    for($i=1;$i<count($nhatro_dacdiem);$i++){
      $list_item.='<li class="list-group-item">';
      $list_item.=get_dacdiem($nhatro_dacdiem[$i]);
      $list_item.='</li>';
    }
    }else{
    for($i=1;$i<5;$i++){
      $list_item.='<li class="list-group-item">';
      $list_item.=get_dacdiem($nhatro_dacdiem[$i]);
      $list_item.='</li>';
    }
    }
  

    $nhatrodiachi = $set['nhatro_diachi'].", ".$set['duong_name'].", ".$set['phuong_name'];
    if($nhatrotype==1){
          $label = "Cho Thuê";
    }
    elseif($nhatrotype==2){
          $label = "Share Phòng";
    }
    else{
          $label = "Cần bán";
    }
    echo '
    <li>
    <a href="nhatro.php?id='.$nhatro_id.'&name='.removesign($nhatroname).'" title="'.$nhatroname.'">
            <div class = "span_gia">
            <span class="label title-label"> '.$label.' </span>
            <span class="thumb">
              <img class="thumb" src="'.$thumb.'">
            </span>
            <span class="special">
                <h3 class="tennhatro">'.$nhatroname.'</h3>
                <h4><span class="glyphicon glyphicon-usd"></span><span style="color: #000;">  Giá: </span>'.$nhatro_gia.' VNĐ</h4>
                <h6 ><span class="glyphicon glyphicon-map-marker"></span> Đ/c: '.$nhatrodiachi.'</h6>
                <h6><span class="glyphicon glyphicon-eye-open"></span> Lượt xem: '.$set['nhatro_views'].'</h6>
                <h6><span class="glyphicon glyphicon-calendar"></span> Ngày: '.date('d-m-Y',strtotime($set['ngaydang'])).'</h6>
                
                <span class="clear-fix">
              </span>
            </div>
            <div class="bginfo clear-fix">
                <ul class="list-group">
                  '.$list_item.'
                </ul>
            </div></a>
    </li>
    ';
    
    } // END WHILE
  } // end numrows
  ?>
</ul>
</div>
<div class="bottom" style="display: block; text-align: -webkit-center;">
<ul class="pagination pagination-sm">
  <?php
      if($page > 1){  // neu can hien thi so trang
        $next = $start + $display;
        $prev = $start - $display;
        $current = ($start/$display)+1;
        // hien tri trang Prev
        if($current !=1){
          echo "<li><a href='?start=$prev&page=$page'> << </a></li>";
        } // end prev
        // hien thi số link trang
        for($i=1;$i<=$page;$i++){
            if($current != $i) {
            echo "<li><a href='?start=".($display*($i-1))."'>$i</a></li>";
        } else{
            echo "<li class='active'><a href='#'>$i<span class='sr-only'>(current)</span></a></li>";
        }
        } // end for

        if($current != $page){
          echo "<li><a href='?start=$next&page=$page'> >> </a></li>";
        } // end next
      }
  ?>
</ul>
</div>