<?php
class connection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tugas2";
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        return $this->db;
    }
    
    public function getDosen(){
        return;
    }
}

$database = new connection();
?>