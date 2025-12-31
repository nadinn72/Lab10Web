<?php
class Database
{
    protected string $host;
    protected string $user;
    protected string $password;
    protected string $db_name;
    protected mysqli $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }

    private function getConfig(): void
    {
        include_once("config.php");
        $this->host     = $config['host'];
        $this->user     = $config['username'];
        $this->password = $config['password'];
        $this->db_name  = $config['db_name'];
    }

    public function query(string $sql)
    {
        return $this->conn->query($sql);
    }

    public function prepare(string $sql): mysqli_stmt
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }
        return $stmt;
    }

    public function lastInsertId(): int
    {
        return (int)$this->conn->insert_id;
    }
}
?>
