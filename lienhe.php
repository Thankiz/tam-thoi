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
    </style>
</head>
<body>
    <nav>
        <label class="logo">Trường THPT Nguyễn Huệ </label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="lienhe.php">Liên hệ</a></li>
            <li><a href="tuyensinh.php">Tuyển sinh</a></li>
            <li><a href="login.php" class="btn btn-success">Đăng nhập</a></li>
        </ul>
    </nav>
    <div class="section1">
		<!-- <label class="img_text">Chúng tôi dạy học sinh một cách cẩn thận</label> -->
		<img class="main_img" src="./image/lienhe.png">
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
	<!-- <center>
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
	</div> -->
    <div class="border" style="padding:15px;margin:15px;border-radius:5px"><div height="500px" class="embed-responsive embed-responsive-16by9">  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.316805604221!2d106.68323171525445!3d20.859277186090463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7af2e3d4bf3f%3A0xfa77a6d07c44832f!2zU-G7nyBHacOhbyBE4bulYyBWw6AgxJDDoG8gVOG6oW8gSOG6o2kgUGjDsm5n!5e0!3m2!1svi!2s!4v1654849482759!5m2!1svi!2s" title="" allowfullscreen></iframe></div></div>


    

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
		<h3 class="footer_text">Bản quyền thuộc về trường THPT Nguyễn Huệ</h3>
	</footer>
</body>
</html>