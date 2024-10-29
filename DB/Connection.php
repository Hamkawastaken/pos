<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_oop');

class Connection {
    public $db;

    public function __construct()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if (!$conn) {
            die('Gagal Terhubung Kedalam Database');
        } else {
            $this->db = $conn;
            return $this->db;
        }
    }
}