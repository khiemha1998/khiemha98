<?php

Class User extends Connection
{
    // Thêm dữ liệu user vào trong CSDL
    public function create()
    {
        // 1. Kiểm tra nút submit đã được nhấn hay chưa
        if (isset($_POST['btnThem'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $gioitinh = $_POST['gioitinh'];
            $tenlop = $_POST['class_id'];
            $machuyennganh = $_POST['major_id'];

            $sql = "INSERT INTO students (name,birthday,address,sex,class_id, major_id) VALUES ('$ten','$ngaysinh','$diachi',$gioitinh,$tenlop, $machuyennganh)";

            // execute command sql
            $this->conn->query($sql);
        }

    }

    // Lấy ra danh sách người dùng
    public function getList()
    {
        $sql = "SELECT s.id AS masv, s.name AS Tensv, birthday AS NgaySinh, address as Diachi, sex as Gioitinh, m.name as ChuyenNganh,c.name as tenlop
                FROM students s
                 LEFT JOIN majors m ON m.id = s.major_id
                LEFT JOIN classes c ON c.id = s.class_id";
            


        $ketqua = $this->conn->query($sql);

        $arrData = []; // mảng lưu kết quả

        // kiểm tra có tồn tại dữ liệu không
        if ($ketqua->num_rows > 0) {
            // Sử dụng vòng lặp while duyệt qua từng kết trả về
            while ($row = $ketqua->fetch_assoc()) {
                $arrData[] = $row;
            }
        }

        return $arrData;
    }
    public function getDetail($id)
    {
        $sql = "SElECT * FROM students WHERE id = $id";
        $ketqua = $this->conn->query($sql);
        $arrData = []; // mảng lưu kết quả
        // kiểm tra có tồn tại dữ liệu không
        if ($ketqua->num_rows > 0) {
            // Sử dụng vòng lặp while duyệt qua từng kết trả về
            while ($row = $ketqua->fetch_assoc()) {
                $arrData[] = $row;
            }
        }
        return $arrData[0];
    }
    public function update($masv)
    {
        if (isset($_POST['btnSua'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $gioitinh = $_POST['gioitinh'];
            $machuyennganh = $_POST['major_id'];
            $tenlop = $_POST['class_id'];

            $sql = "UPDATE students
                    SET name = '$ten', birthday = '$ngaysinh' , address = '$diachi' , sex = $gioitinh, major_id = $machuyennganh ,class_id = '$tenlop'
                    WHERE id= $masv";


            // execute command sql

            $this->conn->query($sql);
        }
    }
    public function delete($id)
    {
    $sql = "DELETE FROM students WHERE id = $id";
    $this->conn->query($sql);
    }
}