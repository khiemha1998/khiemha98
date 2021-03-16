<?php
include_once './view/layout/header.php'
?>
<div class="container">
    <a href="?method=list&controller=major"  class="btn btn-primary" >Danh dách</a>
    <h2>Sửa tên ngành</h2>
    <form action=" " method="post">
        <div class="form-group">
            <label for="email">Tên</label>
            <input value="<?= $data['name'] ?>" type="text" class="form-control" id="email" placeholder="" name="ten">
        </div>
        <button type="submit" class="btn btn-default" name="btnSua">Sửa</button>
    </form>
</div>


<?php
include_once './view/layout/footer.php'
?>