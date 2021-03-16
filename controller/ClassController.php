<?php

include_once 'model/Classes.php';

class ClassController
{
    public function create()
    {
        if (isset($_POST['btnThem'])) {
            $ClassModel = new Classes();
            $ClassModel->create();

            $url_redirect = 'http://mvc.local/?method=list&controller=class';
            header("Location: $url_redirect");
        }


        // chuyển về trang danh sách

        include_once './view/class/create.php';

    }

    public function danhsach()
    {
        $ClassModel = new Classes();
        $arrData =  $ClassModel->getList();

        include_once './view/class/list.php';
    }
    public function update()
    {
      $malop = $_GET['id'];//Lấy mã ngành từ url

        $ClassModel = new Classes();
        $data = $ClassModel->getDetail($malop);

        if (isset($_POST['btnSua'])) {
            //Gọi hàm update
            $ClassModel->update($malop);
            //chuyển về trang danh sách
            $url_redirect = 'http://mvc.local/?method=list&controller=class';
            header("Location: $url_redirect");
        }

        include_once './view/class/update.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        $class = new Classes();
        $class->delete($id);
        //chuyển về trang danh sách
        $url_redirect = 'http://mvc.local/?method=list&controller=class';
        header("Location: $url_redirect");
    }

    public function deleteajax()
    {
        $id = $_GET['id'];
        $class = new Classes();
        $class->delete($id);
    }
}

$class = new ClassController();
if (!empty($_GET['method'])) {
    $method = $_GET['method'];
    if ($method == 'create') {
        $class->create();
    } elseif ($method == 'list') {
        $class->danhsach();
    }elseif ($method == 'update') {
        $class->update();
    }elseif ($method == 'delete') {
        $class->delete();
    }elseif ($method == 'deleteajax') {
        $class->deleteajax();
    }
}
die();
