<?php
    session_start();
    error_reporting(0);
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
    $sql="SELECT * FROM course";
    $result=mysqli_query($data,$sql);
    if($_GET['course_id'])
    {
        $c_id=$_GET['course_id'];
        $sql2="DELETE FROM course WHERE id = '$c_id'";
        $result2=mysqli_query($data,$sql2);
        if($result2)
        {
            header("location: admin_view_course.php");
        }
    }
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
    <style type="text/css">
        .table_th{
            padding: 20px;
            font-size: 20px;
        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
	<?php
        include 'admin_sidebar.php';
   	?>
	<div class="content">
        <center>
            <h1>Thông tin môn học</h1>
            <table border="1px">
                <tr>
                    <th class="table_th">Tên môn học</th>
                    <th class="table_th">Ảnh</th>
                    <th class="table_th">Xóa</th>
                    <th class="table_th">Cập nhật</th>
                </tr>
                <?php
				    while($info=$result->fetch_assoc()){
			    ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['name']}";?></td>
                    <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}";?>"></td>
                    <td class="table_td"><?php echo "<a onClick= \" javascript:return confirm('Bạn muốn xóa thông tin môn học này?'); \" class='btn btn-danger' href='admin_view_course.php?course_id={$info['id']}'>Xóa bỏ</a>";?></td>
                    <td class="table_td"><?php echo "<a href='admin_update_course.php?course_id={$info['id']}' class='btn btn-primary'>Cập nhật</a>"; ?></td>
                </tr>
                <?php
				    }
			    ?>
            </table>
        </center>
	</div>
</body>
</html>