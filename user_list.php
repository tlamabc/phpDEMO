<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng</title>
</head>
<body>
    <h1>Danh sách người dùng</h1>

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

    // Xử lý dữ liệu gửi từ form
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Thực hiện truy vấn để thêm người dùng vào bảng users
        $sql = "INSERT INTO users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "Thêm người dùng thành công.<br>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Truy vấn dữ liệu từ bảng users và hiển thị trong bảng
    $result = mysqli_query($conn, "SELECT * FROM users");

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>STT</th><th>Họ và tên</th><th>Tên người dùng</th><th>Email</th><th>Sửa</th><th>Xóa</th></tr>";

        $stt = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $stt . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Sửa</a></td>";
            echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Xóa</a></td>";
            echo "</tr>";
            $stt++;
        }

        echo "</table>";
    } else {
        echo "Không có người dùng nào.";
    }

    mysqli_close($conn);
    ?>

    <br>
    <a href="user_input.php">Thêm người dùng khác</a>
</body>
</html>
