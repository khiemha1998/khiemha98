<?php

class Connection
{
    //Định nghĩa thuộc tính của lớp
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "hocmysql";


    protected $conn = null; //connection to database
    protected $result = null; //kết quả

    protected $table = null; //chỉ định tên bảng

    //Hàm khởi tạo - luôn được gọi khi lớp được khởi tạo
    public function __construct()
    {
        //Kết nối CSDL
        $this->connect();
    }

    public function connect()
    {
        $this->conn = mysqli_connect(
            $this->servername,
            $this->username,
            $this->password,
            $this->database
        );
        if (!$this->conn) {
            die('Kết nối thất bại');
        } else {
            //Kết nối thành công
            $this->conn->set_charset("utf8");
        }
        return $this->conn;
    }
    public function execute($sql){
        $this->result=$this->conn->query($sql);
        return $this->result;
    }
}

