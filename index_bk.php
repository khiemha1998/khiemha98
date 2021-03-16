<?php

// step 1 . Khởi kết nối CSDL
include_once 'model/Connection.php';
include_once 'model/User.php';


// khởi tạo connection
$connection = new Connection();

if (!empty($_GET['controller'])) {

    $controller = $_GET['controller'];

    if ($controller == 'user') {

        include_once 'controller/UserController.php';

    }
}
