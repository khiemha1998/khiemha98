<?php
include_once './view/layout/header.php'
?>

<div class="container">
    <h2>Danh sách lớp</h2>
    <a href="?method=create&controller=class"  class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
        <tr>
            <th>Mã Lớp</th>
            <th>Tên Lớp</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrData as $item):
            ?>
            <tr>
                <td><?= $item['MaLop']; ?></td>
                <td><?= $item['TenLop']; ?></td>
                <td>
                    <a href="http://mvc.local/?method=update&controller=class&id=<?= $item['MaLop'] ?>" class="btn btn-primary">Sửa</a>
                    <a href="http://mvc.local/?method=delete&controller=class&id=<?= $item['MaLop'] ?>" class="btn btn-danger">Xóa</a>
                    <a href="javascript:void (0)" class="btn btn-warning btnDelete" data-id="<?= $item['MaLop'] ?>">Xóa ajax</a>
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
                url: "http://mvc.local/?method=deleteajax&controller=class",
                data: {
                    id : id
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
