<?php
	error_reporting(0);
	session_start();
	session_destroy();
	if($_SESSION['message'])
	{
		$message=$_SESSION['message'];
		echo "<script type='text/javascript'> alert('$message') </script>";
	}
	$host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";
    $data=mysqli_connect($host,$user,$password,$db);
	$sql="SELECT * FROM teacher";
	$result=mysqli_query($data,$sql);
	$sql2="SELECT * FROM course";
	$result2=mysqli_query($data,$sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lí học sinh</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .tuyensinh {
            text-align: center; /* Căn giữa theo chiều ngang */
            margin-top: 50px; /* Khoảng cách từ trên xuống */
            margin-bottom: 50px; /* Khoảng cách từ dưới lên */
        }
		.tuyensinh {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    color: #333; /* Màu chữ */
}

.tuyensinh p {
    margin: 0; /* Xóa khoảng cách dưới đoạn văn bản */
}

.tuyensinh p:first-child {
    font-weight: bold; /* Đậm cho dòng đầu tiên */
}

.tuyensinh p:nth-child(n+2) {
    margin-top: 10px; /* Khoảng cách giữa các đoạn văn bản */
}

.tuyensinh p:nth-child(odd) {
    font-weight: bold; /* Đậm cho các dòng lẻ */
}

.tuyensinh p:nth-child(odd)::after {
    content: ": "; /* Thêm dấu hai chấm sau các dòng lẻ */
}

.tuyensinh p:nth-child(even)::after {
    content: ""; /* Loại bỏ dấu hai chấm sau các dòng chẵn */
}
.footer {
  background-color: #333; 
  color: #fff;
  padding: 20px 0; 
  text-align: center; 
}

.footer .wrapper {
  max-width: 1200px; 
  margin: 0 auto; 
}

.footer .section {
  display: flex; 
  flex-wrap: wrap; 
}

.footer .col_1_of_4 {
  width: 25%; 
  padding: 0 15px; 
}

.footer h4 {
  color: #fff; 
}

.footer ul {
  list-style: none; 
  padding: 0;
}

.footer ul li {
  margin-bottom: 10px;
}

.footer ul li a {
  color: #fff; 
  text-decoration: none;
}

.footer .copy_right {
  margin-top: 20px; 
}

.footer .footer_text {
  color: #fff; 
}

    </style>
</head>
<body>
    <nav>
        <label class="logo">Trường THPT Nguyễn Huệ</label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="lienhe.php">Liên hệ</a></li>
            <li><a href="tuyensinh.php">Tuyển sinh</a></li>
            <li><a href="login.php" class="btn btn-success">Đăng nhập</a></li>
        </ul>
    </nav>
    <div class="section1">
		<!-- <label class="img_text">Chúng tôi dạy học sinh một cách cẩn thận</label> -->
		<img class="main_img" src="./image/ts.jpg">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="./image/OIP.jfif">		
			</div>
			<div class="col-md-8">
				<h1>THÔNG TIN TUYỂN SINH VÀO LỚP 10 THPT</h1>
				<p>TRƯỜNG THPT Nguyễn Huệ - ĐỊA CHỈ GIÁO DỤC TIN CẬY Ở THÀNH PHỐ HẢI PHÒNG - Luôn đứng ở vị trí tốp đầu trong khối các trường THPT thành phố Hải Phòng về chất lượng giáo dục toàn diện, chất lượng học sinh giỏi và học sinh thi đỗ Đại học. - Nhà nước tặng thưởng Huân chương Lao động hạng Hạng Nhất, Hạng Nhì, Hạng Ba. - Được tặng thưởng nhiều bằng khen, cờ thi đua của Thủ tướng Chính phủ; Bộ Giáo dục và Đào tạo và UBND thành phố Hải Phòng. - Đạt trường chuẩn Quốc gia cấp độ 2.</p>	
			</div>	
		</div>
	</div>
	<!-- <center>
		<h1>Giáo viên</h1>
	</center>
	<div class="container">
		<div class="row">
			<?php
				while($info=$result->fetch_assoc()){
			?>
			<div class="col-md-4">
				<img class="teacher" src="<?php echo "{$info['image']}";?>">
				<h3 style="font-weight: bold; font-size: 24px;"><?php echo "{$info['name']}";?></h3>		
				<h3 style="font-size: 17px;"><?php echo "{$info['description']}";?></h3>		
			</div>
			<?php
				}
			?>
		</div>
	</div>
	<center>
		<h1>Môn học</h1>
	</center>
	<div class="container">
		<div class="row">
			<?php
				while($info=$result2->fetch_assoc()){
			?>
			<div class="col-md-4">
				<img class="course" src="<?php echo "{$info['image']}";?>">
				<h3 style="font-weight: bold; font-size: 24px;"><?php echo "{$info['name']}";?></h3>				
			</div>
			<?php
				}
			?>		
		</div>	
	</div> -->
	<center>
		<h1 class="adm">Phiếu tuyển sinh</h1>
	</center>
	<div align="center" class="admission_form">
		<form action="data_check.php" method="POST">		
            <div class="adm_int">
                <label class="label_text">Tên học sinh</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Số điện thoại</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Thông tin khác</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div class="adm_int" >	
                <input class="btn btn-primary" id="submit" type="submit" value="xác nhận" name="apply" >
            </div>
		</form>	
	</div>
    <div class="tuyensinh">
    <p>SỞ GIÁO DỤC VÀ ĐÀO TẠO HẢI PHÒNG<br>

                TRƯỜNG THPT Nguyễn Huệ<br>

                THÔNG TIN TUYỂN SINH VÀO LỚP 10 THPT<br>

                NĂM HỌC 2022- 2023<br>

                Chỉ tiêu tuyển sinh:  

                540 học sinh (12 lớp)<br>

                Thời gian nộp hồ sơ:  

                Từ 20/4/2023 đến hết 05/5/2023<br>

                Thời gian đổi nguyện vọng:  

                Từ 06/5/2023 đến hết 12/5/2023<br>

                Thời gian thi:  

                Từ 01/6/2023 đến 03/6/2023</p>	</div>
	<footer>
	<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Thông Tin</h4>
						<ul>
						<li><a href="#">Trường THPT Nguyễn Huệ</a></li>
						<li><a href="#"><span>Email: thptnguyenhue@gmail.com</span></a></li>
						<li><a href="#">Giờ mở cửa: 6h 30m sáng -> 5h 30m chiều</a></li>
						<li><a href="#"><span>Liên Hệ Với Nhà Trường</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Địa Chỉ Nhà Trường</h4>
						<ul>
						<li><a href="#">Địa Chỉ:  Hải Phòng</a></li>
						<li><a href="login.php"><span>Tìm Trên Bản Đồ</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài Khoản Của Bạn</h4>
						<ul>
							<li><a href="login.php">Đăng Nhập</a></li>
							<li><a href="index.php">Xem Thông Tin</a></li>
							<li><a href="#">Trợ Giúp</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên Hệ Với Nhà Trường</h4>
						<ul>
							<li><span>SĐT1: 0333333333</span></li>
							<li><span>SĐT2: 0999999999</span></li>
						</ul>
						<div class="social-icons">
							<h4>Theo Dõi Chúng Tôi</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p></p>
		   </div>
     </div>
    </div>
		<h3 class="footer_text">Bản quyền thuộc về trường THPT Nguyễn Huệ</h3>
	</footer>
</body>
</html>