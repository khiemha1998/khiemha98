<?php

include_once 'model/Major.php';

class MajorController
{
    public function create()
    {
        if (isset($_POST['btnThem'])) {
            $MajorModel = new Major();
            $MajorModel->create();

            $url_redirect = 'http://mvc.local/?method=list&controller=major';
            header("Location: $url_redirect");
        }


       // chuyển về trang danh sách

        include_once './view/major/create.php';

    }

    public function danhsach()
    {
        $MajorModel = new Major();
        $arrData = $MajorModel->getList();

        include_once './view/major/list.php';
    }
    public function update()
    {
        $MaNganh = $_GET['id'];//Lấy mã ngành từ url

        $MajorModel = new Major();
        $data = $MajorModel->getDetail($MaNganh);

        if (isset($_POST['btnSua'])) {
            //Gọi hàm update
            $MajorModel->update($MaNganh);
            //chuyển về trang danh sách
            $url_redirect = 'http://mvc.local/?method=list&controller=major';
            header("Location: $url_redirect");
        }

        include_once './view/major/update.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        $major = new Major();
        $major->delete($id);
        //chuyển về trang danh sách
        $url_redirect = 'http://mvc.local/?method=list&controller=major';
        header("Location: $url_redirect");
    }

    public function deleteajax()
    {
        $id = $_GET['id'];
        $major = new Major();
        $major->delete($id);
    }
}

$major = new MajorController();
if (!empty($_GET['method'])) {
    $method = $_GET['method'];
    if ($method == 'create') {
        $major->create();
    } elseif ($method == 'list') {
        $major->danhsach();
    }elseif ($method == 'update') {
        $major->update();
    }elseif ($method == 'delete') {
        $major->delete();
    }elseif ($method == 'deleteajax') {
        $major->deleteajax();
    }
}
die();
