<?php
include_once './view/layout/header.php'
?>
<div class="container">
    <a href="?method=list&controller=major"  class="btn btn-primary" >Danh sách</a>
    <h2>Thêm ngành</h2>
    <form action=" " method="post">
        <div class="form-group">
            <label>Nhập tên ngành</label>
            <input type="text" class="form-control" id="email" placeholder="" name="ten">
        </div>
        <button type="submit" class="btn btn-default" name="btnThem">Thêm</button>
    </form>
</div>

<?php
include_once './view/layout/footer.php'
?>
