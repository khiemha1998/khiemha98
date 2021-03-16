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

$sql = "SELECT id as MaSV, name as TenSV,birthday as NgaySinh, address as DiaChi , sex as GioiTinh FROM students";

$ketqua = $conn->query($sql);

$arrData = []; // mảng lưu kết quả

// kiểm tra có tồn tại dữ liệu không
if ($ketqua->num_rows > 0)
{
    // Sử dụng vòng lặp while duyệt qua từng kết trả về
    while($row = $ketqua->fetch_assoc()) {
        $arrData[] = $row;
    }
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
    <h2>Danh Sách Người Dùng</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Mã SV</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Giới Tính</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arrData as $item): ?>
            <tr>
                <td><?= $item['MaSV'] ?></td>
                <td><?= $item['TenSV']; ?></td>
                <td><?= $item['NgaySinh'] ?></td>
                <td><?= $item['DiaChi'] ?></td>
                <td><?= $item['GioiTinh'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
