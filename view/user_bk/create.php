<?php
// 1. Khơi tạo thông tin Kết nối CSDL
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hocmysql';

// 2.  Khởi tạo đối tượng để kết nối đến CSDL
$conn = new mysqli($host, $username, $password, $dbname);
// 3. Kiểm tra kết nối thành công hay thất bại
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 1. Kiểm tra nút submit đã được nhấn hay chưa
if (isset($_POST['btnThem'])) {
    // 2 Lấy chi tiết dữ liệu
    $ten = $_POST['ten'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $gioitinh = $_POST['gioitinh'];

    $sql = "INSERT INTO students (name,birthday,address, class_id, sex) VALUES ('$ten','$ngaysinh','$diachi','',$gioitinh)";
    // execute command sql
    $conn->query($sql);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Thêm người dùng</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Tên</label>
            <input type="text" class="form-control" id="email" placeholder="" name="ten">
        </div>
        <div class="form-group">
            <label for="pwd">Ngày Sinh</label>
            <input type="date" class="form-control" id="pwd" placeholder="" name="ngaysinh">
        </div>
        <div class="form-group">
            <label for="pwd">Địa chỉ</label>
            <input type="text" class="form-control" id="pwd" placeholder="" name="diachi">
        </div>
        <div class="checkbox">
            <label><input type="radio" name="gioitinh" value="1"> Nam</label>
            <label><input type="radio" name="gioitinh" value="0"> Nữ</label>
        </div>
        <button type="submit" class="btn btn-default" name="btnThem">Thêm</button>
    </form>
</div>

</body>
</html>
