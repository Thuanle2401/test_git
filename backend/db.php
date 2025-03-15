<?php
$servername = "localhost";
$username = "root"; // Tài khoản mặc định của XAMPP
$password = ""; // Nếu bạn không đặt mật khẩu cho MySQL, để trống
$database = "order_db"; // Tên database của bạn

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
