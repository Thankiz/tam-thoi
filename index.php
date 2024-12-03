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

		.slide{
			position: absolute;
		}
		#slideshow {
            position: relative;
            max-width: 500px;
            margin: auto;
        }
		#slideshow img {
            display: none;
            width: 100%;
        }
		.h2 {
    	position: absolute;
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
		<img class="main_img" src="./image/anh2.png">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="./image/OIP.jfif">		
			</div>
			<div class="col-md-8">
				<h1>Chào mừng đến với trường THPT Nguyễn Huệ </h1>
				<p>Lịch sử phát triển 10-12-2016 Trường THPT Nguyễn Huệ được thành lập năm 1999.Trường đóng trên địa bàn Thị Trấn Núi Đối- Huyện Kiến Thụy. Khi vừa thành lập, năm học 1999-2000, trường THPT Nguyễn Huệ có 6 lớp. Việc thành lập trường đã mở ra một chặng đường phát triển mới của giáo dục huyện nhà.Từ đây nhiều học sinh có cơ hội được tiếp tục con đường học tập của mình Trong năm qua Ban giám hiệu nhà trường đã đoàn kết, nhất trí chỉ đạo công việc của nhà trường quan tâm, trú trọng xây dựng một tập thể đoàn kết , có phẩm chất đạo đức tốt tạo mọi điều kiện cho cán bộ giáo viên - nhân viên tham gia học tập, nâng cao trình độ chuyên môn nghiệp vụ, đáp ứng nhu cầu hội nhập giáo dục hiện nay.</p>	
			</div>	
		</div>
		
		<div id="slideshow">
		<h2>Hình Ảnh Tiêu Biểu Về Nhà Trường</h2>
        <img src="image/trg.jpg" alt="Image 1">
        <img src="image/OIP (1).jfif" alt="Image 2">
        <img src="image/anh2.png" alt="Image 3">
    </div>

    <script>
        var index = 0;
        var images = document.querySelectorAll('#slideshow img');
        var interval = setInterval(nextImage, 3000); // Change image every 3 seconds

        function nextImage() {
            images[index].style.display = 'none';
            index = (index + 1) % images.length;
            images[index].style.display = 'block';
        }
    </script>
	</div>



	<center>
		<h1>Đội ngũ giáo viên giảng dạy</h1>
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
	</div>
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
	<footer>
	</div>
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
</body>
</html>
		<h3 class="footer_text">Bản quyền thuộc về trường THPT Nguyễn Huệ </h3>
	</footer>
</body>
</html>