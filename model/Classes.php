<?php


class Classes extends Connection
{
    // Thêm dữ liệu user vào trong CSDL
    public function create()
    {
        // 1. Kiểm tra nút submit đã được nhấn hay chưa
        if (isset($_POST['btnThem'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $sql = "INSERT INTO classes (name) VALUES ('$ten')";
            // execute command sql
            $this->conn->query($sql);
        }

    }

    // Lấy ra danh sách ngành
    public function getList()
    {
        $sql = "SELECT id AS MaLop, name AS TenLop FROM classes";

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
        $sql = "SElECT * FROM classes WHERE id = $id";
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

    public function update($MaLop)
    {
        if (isset($_POST['btnSua'])) {
            // 2 Lấy chi tiết dữ liệu
            $ten = $_POST['ten'];
            $sql = "UPDATE classes
                    SET name = '$ten'
                    WHERE id= $MaLop";
            // execute command sql
            $this->conn->query($sql);
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM classes WHERE id = $id";
        $this->conn->query($sql);
    }
}