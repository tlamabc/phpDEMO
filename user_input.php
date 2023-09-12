<!DOCTYPE html>
<html>
<head>
    <title>Thêm người dùng</title>
</head>
<body>
    <h1>Thêm người dùng</h1>
    <form method="post" action="user_list.php">
        <label for="fullname">Họ và tên:</label>
        <input type="text" name="fullname" id="fullname" required><br><br>

        <label for="username">Tên người dùng:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="submit" value="Lưu">
    </form>
</body>
</html>
