<!DOCTYPE html>
<html>
<head>
    <title>Sửa người dùng</title>
</head>
<body>
    <h1>Sửa người dùng</h1>

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

    // Xử lý sự kiện khi người dùng lưu thông tin chỉnh sửa
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Thực hiện truy vấn để cập nhật thông tin người dùng
        $sql = "UPDATE users SET fullname='$fullname', username='$username', email='$email', password='$password' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Chỉnh sửa người dùng thành công.<br>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Lấy thông tin người dùng cần chỉnh sửa
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];

            echo "<form method='post' action='edit_user.php'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "Họ và tên: <input type='text' name='fullname' value='$fullname'><br>";
            echo "Tên người dùng: <input type='text' name='username' value='$username'><br>";
            echo "Email: <input type='email' name='email' value='$email'><br>";
            echo "Mật khẩu: <input type='password' name='password' value='$password'><br>";
            echo "<input type='submit' name='submit' value='Lưu'>";
            echo "</form>";
        } else {
            echo "Người dùng không tồn tại.";
        }
    }

    mysqli_close($conn);
    ?>

    <br>
    <a href="user_list.php">Quay lại danh sách người dùng</a>
</body>
</html>
