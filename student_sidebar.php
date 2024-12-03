
<header class="header">
	<a href="">Trang thông tin học sinh</a>
	<div class="logout">	
		<li>Hello 

		<?php

if(isset($_SESSION['username'])) {
  $host="localhost";
  $user="root";
  $password="";
  $db="schoolproject";

  $conn = new mysqli($host,$user,$password,$db);

  if ($conn->connect_error) {
	die("Kết nối không thành công: " . $conn->connect_error);
}
$loggedInUsername = $_SESSION['username'];

$sql = "SELECT username FROM user WHERE username = '$loggedInUsername'";

    // Thực thi truy vấn
    $result = $conn->query($sql);

    // Kiểm tra kết quả và hiển thị
    if ($result->num_rows > 0) {
        // Lặp qua các hàng kết quả (chỉ có 1 hàng do chỉ lấy thông tin của người dùng đăng nhập)
        while($row = $result->fetch_assoc()) {
            echo  $row["username"]. "<br>";
        }
    } else {
        echo "Không có kết quả";
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Nếu không có người dùng nào đăng nhập, hiển thị thông báo lỗi hoặc chuyển hướng đến trang đăng nhập
    echo "Bạn cần đăng nhập để xem thông tin.";
}
	// $sql = "SELECT username FROM user";
	// $result = $conn->query($sql);
	// while($row = $result->fetch_assoc()) {
    //     echo "Username: " . $row["username"]. "<br>";
	// }
?>

		</li>	
		<a href="logout.php" class="btn btn-primary">Đăng xuất</a>
	</div>
</header>
<aside>	
	<ul>		
		<li>
			<a href="student_profile.php">Thông tin của tôi</a>
		</li>
		<li>
			<a href="listmh.php">Các môn học của tôi</a>
		</li>
		<li>
			<a href="ketqua.php">Kết quả của tôi</a>
		</li>
	</ul>
</aside>