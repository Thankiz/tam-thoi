<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";
    $data=mysqli_connect($host,$user,$password,$db);
    $sql="SELECT * FROM admission";
    $result=mysqli_query($data,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển của quản trị viên</title>
    <?php
        include 'admin_css.php';
    ?>
</head>
<body>
   <?php
        include 'admin_sidebar.php';
   ?>
	<div class="content">
        <center>
            <h1>Thông tin đăng ký nhập học</h1>
            <br><br>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Tên</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Số điện thoại</th>
                    <th style="padding: 20px; font-size: 15px;">Thông tin khác</th>
                </tr>
                <?php
                    while($info=$result->fetch_assoc()){
                ?>
                <tr>
                    <td style="padding: 20px;"><?php echo "{$info['name']}";?></td>
                    <td style="padding: 20px;"><?php echo "{$info['email']}";?></td>
                    <td style="padding: 20px;"><?php echo "{$info['phone']}";?></td>
                    <td style="padding: 20px;"><?php echo "{$info['message']}";?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </center>
	</div>
</body>
</html>