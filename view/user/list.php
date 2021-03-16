<?php
include_once './view/layout/header.php'
?>

<div class="container">
    <h2>Danh sách Sinh Viên</h2>
    <a href="?method=create&controller=user"  class="btn btn-primary">Thêm</a>

    <table class="table">
        <thead>
        <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Giới tính</th>
            <th>Chuyên Ngành</th>
            <th>Lớp</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrData as $item):
            ?>
            <tr>
                <td><?= $item['masv']; ?></td>
                <td><?= $item['Tensv']; ?></td>
                <td><?= $item['NgaySinh']; ?></td>
                <td><?= $item['Diachi']; ?></td>
                <td><?= $item['Gioitinh'] == 1 ? 'Nam' : 'Nữ' ; ?></td>
                <td><?= $item['ChuyenNganh']; ?></td>
                <td><?= $item['tenlop']; ?></td>

               <td>
                   <a href="http://mvc.local/?method=update&controller=user&id=<?= $item['masv'] ?>" class="btn btn-primary">Sửa</a>
                   <a href="http://mvc.local/?method=delete&controller=user&id=<?= $item['masv'] ?>" class="btn btn-danger">Xóa</a>
                   <a href="javascript:void (0)" class="btn btn-warning btnDelete" data-id="<?= $item['masv'] ?>">Xóa ajax</a>
               </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btnDelete').click(function () {
            var id = $(this).attr('data-id'); // lấy giá trị của thuộc tính trong thẻ DOM HTML
            var me = this;
            // Tạo request chạy ngầm
            $.ajax({
                method: "GET", // get/post
                url: "http://mvc.local/?method=deleteajax&controller=user",
                data: {
                    masv : id
                },
                dataType: 'html',
                success: function (data) {
                    // sau khi gửi request thàng công
                    $(me).closest('tr').remove();
                }
            });
        });
    });
</script>

<?php
include_once './view/layout/footer.php'
?>
