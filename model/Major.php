<?php


class Major extends Connection
{
    // Thêm dữ liệu user vào trong CSDL
    public function create()
    {
        // 1. Kiểm tra nút submit đã được nhấn hay chưa
        if (isset($_POST['btnThem'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $sql = "INSERT INTO majors (name) VALUES ('$ten')";
            // execute command sql
            $this->conn->query($sql);
        }

    }

    // Lấy ra danh sách ngành
    public function getList()
    {
        $sql = "SELECT id AS MaNganh, name AS TenNganh FROM majors";

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
        $sql = "SElECT * FROM majors WHERE id = $id";
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

    public function update($MaNganh)
    {
        if (isset($_POST['btnSua'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $sql = "UPDATE majors
                    SET name = '$ten'
                    WHERE id= $MaNganh";
            // execute command sql
            $this->conn->query($sql);
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM majors WHERE id = $id";
        $this->conn->query($sql);
    }
}