<?php
include_once 'model/User.php';
include_once 'model/Major.php';
include_once 'model/Classes.php';

class UserController
{
    public function create()
    {
        if (isset($_POST['btnThem'])) {
            $UserModel = new User();
            $UserModel->create();

            //chuyển về trang danh sách
            $url_redirect = 'http://mvc.local/?method=list&controller=user';
            header("Location: $url_redirect");
        }

//
        $chuyennganh = new Major();
        $data_major = $chuyennganh->getList(); // lấy ds chuyên ngành
        $lop = new Classes();
        $data_class = $lop->getList();




        include_once './view/user/create.php';
    }

    public function danhsach()
    {
        $userModel = new User();
        $arrData = $userModel->getList();

        include_once './view/user/list.php';
    }

    public function update()
    {
        $id = $_GET['id'];//Lấy mã người dùng từ url

        $userModel = new User();
        $data = $userModel->getDetail($id);

        $lop =new Classes();
        $data_class = $lop->getList();
        
        $chuyennganh = new Major();
        $data_major = $chuyennganh->getList(); // lấy ds chuyên ngành

        if (isset($_POST['btnSua'])) {
            //Gọi hàm update
            $userModel->update($id);
            //chuyển về trang danh sách
            $url_redirect = 'http://mvc.local/?method=list&controller=user';
            header("Location: $url_redirect");
        }

        include_once './view/user/update.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $user = new User();
        $user->delete($id);
        //chuyển về trang danh sách
        $url_redirect = 'http://mvc.local/?method=list&controller=user';
        header("Location: $url_redirect");
    }
    public function deleteajax()
    {
        $id = $_GET['masv'];

        $user = new User();
        $user->delete($id);
    }
}
$user = new UserController(); //khởi tạo 1 lớp
if (!empty($_GET['method'])) {
    $method = $_GET['method'];
    if ($method == 'create') {
        $user->create();
    } elseif ($method == 'list') {
        $user->danhsach();
    }elseif ($method == 'update') {
        $user->update();
    }elseif ($method == 'delete') {
        $user->delete();
    } elseif ($method == 'deleteajax') {
    $user->deleteajax();
}
} else {
    echo 'Trang chủ người dùng';
}
die;