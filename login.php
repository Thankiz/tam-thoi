<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="./image/trg.jpg" class="body_deg">
	<center>
		<div class="form_deg">
			<center class="title_deg">
				Đăng nhập
				<h4>
					<?php 
					error_reporting(0);
					session_start();
					session_destroy();
				echo $_SESSION['loginMessage'];
					?>
				</h4>
			</center>			
			<form action="login_check.php" method="POST" class="login_form">
				<div>
					<label class="label_deg">Tài khoản</label>
					<input type="text" name="username">
				</div>
				<div>
					<label class="label_deg">Mật khẩu</label>
					<input type="Password" name="password">
				</div>
				<div>
					<input class="btn btn-primary" type="submit" name="submit" value="Đăng nhập">
				</div>
				<div style="text-align: center; position: relative; top: 40px; ">
					<a href="index.php" style="color: skyblue;">Trang chủ</a>
				</div>
			</form>
		</div>
	</center>
</body>
</html>