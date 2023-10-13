<?php
include_once 'Database.php';

class User
{
    // Connection
    private $conn;
    // Table
    private $db_table = "tb_user";
    // Columns
    public $id_user;
    public $fullname;
    public $email;
    public $job;
    public $no_telepon;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUser()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    public function getUserId($id_user)
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id_user =" . $id_user;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

$database = new Database();
$db = $database->getConnection();
$query = new User($db);
$result = $query->getUser()->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);
