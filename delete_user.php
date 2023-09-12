<?php
// Kết nối đến cơ sở dữ liệu (sử dụng thông tin kết nối của bạn)
$db_host = "localhost";
$db_user = "id18515821_tlamabc"; // Thay bằng tên người dùng MySQL của bạn
$db_password = "Password123."; // Thay bằng mật khẩu MySQL của bạn
$db_name = "id18515821_demoapp"; // Thay bằng tên cơ sở dữ liệu của bạn

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Xử lý sự kiện khi người dùng xác nhận xóa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Thực hiện truy vấn để xóa người dùng
    $sql = "DELETE FROM users WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Xóa người dùng thành công.<br>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Xóa người dùng</title>
</head>
<body>
