<?php 
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['username'])) {
        header("location:login.php");
    } elseif($_SESSION['usertype'] == 'student') {
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";
    $data = mysqli_connect($host, $user, $password, $db);

    // Xử lý tìm kiếm
    $search = "";
    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($data, $_POST['search']);
        $sql = "SELECT * FROM teacher WHERE name LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM teacher";
    }

    $result = mysqli_query($data, $sql);

    // Xử lý xóa giáo viên
    if ($_GET['teacher_id']) {
        $t_id = $_GET['teacher_id'];
        $sql2 = "DELETE FROM teacher WHERE id = '$t_id'";
        $result2 = mysqli_query($data, $sql2);
        if ($result2) {
            header("location: admin_view_teacher.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển của quản trị viên</title>
    <?php include 'admin_css.php'; ?>
    <style type="text/css">
        .table_th {
            padding: 20px;
            font-size: 20px;
        }
        .table_td {
            padding: 20px;
            background-color: skyblue;
        }
        .search-box {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>
    <div class="content">
        <center>
            <h1>Hồ sơ giáo viên</h1>

            <!-- Form tìm kiếm -->
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Nhập tên giáo viên..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
            <br>

            <table border="1px">
                <tr>
                    <th class="table_th">Tên giáo viên</th>
                    <th class="table_th">Thông tin giáo viên</th>
                    <th class="table_th">Ảnh</th>
                    <th class="table_th">Xóa</th>
                    <th class="table_th">Cập nhật</th>
                </tr>
                <?php
				    while ($info = $result->fetch_assoc()) {
			    ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['name']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['description']}"; ?></td>
                    <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}"; ?>"></td>
                    <td class="table_td">
                        <?php echo "<a onClick=\"javascript:return confirm('Bạn muốn xóa thông tin giáo viên này?');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Xóa bỏ</a>"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "<a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Cập nhật</a>"; ?>
                    </td>
                </tr>
                <?php
				    }
			    ?>
            </table>
        </center>
    </div>
</body>
</html>
