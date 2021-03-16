<?php
include_once './view/layout/header.php'
?>
<div class="container">
    <a href="?method=list&controller=user"  class="btn btn-primary" >Danh sách</a>
    <h2>Thêm Sinh Viên</h2>
    <form action=" " method="post">
        <div class="form-group">
            <label for="email">Tên</label>
            <input type="text" class="form-control" id="email" placeholder="" name="ten">
        </div>
        <div class="form-group">
            <label for="pwd">Ngày sinh</label>
            <input type="date" class="form-control" id="pwd" placeholder="" name="ngaysinh">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" id="pwd" name="diachi">
        </div>
        <div class="checkbox">
            <label><input type="radio" name="gioitinh" value="1">Nam</label>
            <label><input type="radio" name="gioitinh" value="0">Nữ</label>
        </div>

        <div class="form-group">
            <label for="sel1">Chọn chuyên ngành</label>
            <select class="form-control" id="sel1" name="major_id">
                <option value="">-- Chọn --</option>
                <?php foreach ($data_major as $item): ?>
                    <option value="<?= $item['MaNganh'] ?>"> <?= $item['TenNganh'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sel1">Chọn Lớp</label>
            <select class="form-control" id="sel1" name="class_id">
                <option value="">-- Chọn --</option>
                <?php foreach ($data_class as $item): ?>
                    <option value="<?= $item['MaLop'] ?>"> <?= $item['TenLop'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>





        <button type="submit" class="btn btn-default" name="btnThem">Thêm</button>
    </form>
</div>

<?php
include_once './view/layout/footer.php'
?>