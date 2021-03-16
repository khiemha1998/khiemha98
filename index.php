<?php
include_once 'model/Connection.php';
if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
    if ($controller == 'user') {
        include_once 'controller/UserController.php';
    } elseif ($controller == 'major') {
        include_once 'controller/MajorController.php';
    }elseif ($controller=='class'){
        include_once 'controller/ClassController.php';
    }
} else {
    echo 'Trang Chủ';

}