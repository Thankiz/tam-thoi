<?php 
    error_reporting(0);
    session_start();
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
        $search = $_POST['search'];
        $sql = "SELECT * FROM user WHERE usertype = 'student' AND username LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM user WHERE usertype = 'student'";
    }

    $result = mysqli_query($data, $sql);
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
            <h1>Thông tin học sinh</h1>
            <?php  
                if($_SESSION['message']){
                    echo $_SESSION['message'];
                }
                unset($_SESSION['message']);
            ?>
            <br>
            <!-- Form tìm kiếm -->
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Nhập tên học sinh..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
            <br><br>
            <table border="1px">
                <tr>
                    <th class="table_th">Tên tài khoản</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Số điện thoại</th>
                    <th class="table_th">Mật khẩu</th>
                    <th class="table_th">Xóa</th>
                    <th class="table_th">Cập nhật</th>
                </tr>
                <?php
                    while ($info = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['username']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['email']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['phone']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['password']}"; ?></td>
                    <td class="table_td">
                        <?php 
                            echo "<a onClick=\"javascript:return confirm('Bạn muốn xóa thông tin học sinh này?');\" 
                                class='btn btn-danger' 
                                href='delete.php?student_id={$info['id']}'>Xóa bỏ</a>";
                        ?>
                    </td>
                    <td class="table_td">
                        <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Cập nhật</a>"; ?>
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
