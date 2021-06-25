<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin xác thực</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/ex.css">
  <link rel="icon" type="image/png" href="LOGO/favicon.ico">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
        <?php
            include("connect/db_connect.php");
            //error_reporting(E_ALL & ~E_NOTICE);
            error_reporting(0);
            //$vid = $_GET['id'];
            $vid = $_GET['id'];
            $vname = $mysqli->real_escape_string($_GET['ho_ten']);
            $v = $mysqli->real_escape_string($vid);
            //print($vname);
            //print($vid);
                $sql = "SELECT z.vnpt_id,	z.hoten,	z.sdt,	z.email,
                                z.ngaysinh,	z.gioitinh,	z.donvi_chuquan,
                                UPPER(z.donvi_congtac) as donvi_congtac ,	
                                UPPER(z.phongban) as phongban, z.chuyenmon,	
                                z.chucdanh,	z.tenkhongdau, z.hinh, z.nhommau 
                        FROM qr.user_all z WHERE z.trangthai='1' AND z.vnpt_id='$v' LIMIT 1";
                $query = mysqli_query($mysqli, $sql);
                $r=mysqli_fetch_array($query);
                $nr = mysqli_num_rows($query);
                if ($nr==1){
                ?>
                <div class="fadeIn first">
                  <?php //echo "URL".$r['img']; ?>
                  <img src=<?php 
                    if ($r['hinh'] == NULL)
                    {
                      echo 'images/default.png';  
                    } 
                    else{ 
                      echo 'images/'.$r['hinh'];
                      } ?> 
                      id = "icon" alt="VNPT Cà Mau" style="width:30%; height:30%;"/>
                </div>
                <div>
                    <p class='strongt'>********************</p>
                    <p class='strongt'><?php echo $r['donvi_congtac']; ?></p>
                    <p class='strongtt'><?php echo $r['phongban']; ?></p>
                </div>
                <div class="canhtrai">
                    <p><?php echo "Mã nhân viên: ".$r['vnpt_id']; ?></p>
                    <p><?php echo "Họ tên: ".$r['hoten']; ?></p>
                    <p><?php echo "Chức vụ: ".$r['chucdanh']; ?></p>
                    <p><?php echo "Chuyên môn: ".$r['chuyenmon']; ?></p>
                    <p><?php echo "Di động: ".$r['sdt']; ?></p>
                    <p><?php echo "Email: ".$r['email']; ?></p>
                    <p><?php echo "Ngày sinh: ".$r['ngaysinh']; ?></p>
                    <p><?php echo "Giới tính: ".$r['gioitinh']; ?></p>
                    <p><?php echo "Nhóm máu: ".$r['nhommau']; ?></p>
                </div>
                <?php 
                } //end if
                else
                {
                  ?>
                      <div id="formFooter">
                          <img src="LOGO/logo.png" id="icon" alt="User Icon" style="width:40%; height:40%;"/>
                          <h4 style="color:red;">KHÔNG TÌM THẤY THÔNG TIN</h4>
                          <h5 style="color:red;">VUI LÒNG KIỂM TRA LẠI!</h5>
                      </div>
                  <?php
                } //end else
        ?>
      </div>
  </div>
</body>
</html>