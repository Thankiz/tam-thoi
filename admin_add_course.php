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
    if(isset($_POST['add_course']))
    {
        $c_name=$_POST['name'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;
        $dst_db="image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);
        $sql="INSERT INTO course(name,image) VALUES ('$c_name','$dst_db')";
        $result=mysqli_query($data,$sql);
        if($result)
        {
            header("location:admin_view_course.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển của quản trị viên</title>
    <style type="text/css">
        .div_deg{
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
        }
    </style>
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
            <h1>Thêm thông tin môn học</h1><br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Tên môn học:</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Ảnh:</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input type="submit" name="add_course" class="btn btn-primary">
                </div>
            </form>
        </div>   
        </center>
	</div>
</body>
</html>