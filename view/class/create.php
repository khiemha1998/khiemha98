<?php
include_once './view/layout/header.php'
?>
<div class="container">
    <a href="?method=list&controller=class"  class="btn btn-primary" >Danh sách</a>
    <h2>Thêm lớp</h2>
    <form action=" " method="post">
        <div class="form-group">
            <label>Nhập tên lớp</label>
            <input type="text" class="form-control" id="email" placeholder="" name="ten">
        </div>
        <button type="submit" class="btn btn-default" name="btnThem">Thêm</button>
    </form>
</div>

<?php
include_once './view/layout/footer.php'
?>
