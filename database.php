<?php
// File: database.php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        // Set charset untuk menghindari masalah encoding
        $this->conn->set_charset("utf8");
    }

    private function getConfig()
    {
        if (file_exists("config.php")) {
            include_once("config.php");
            $this->host = $config['host'] ?? 'localhost';
            $this->user = $config['username'] ?? 'root';
            $this->password = $config['password'] ?? '';
            $this->db_name = $config['db_name'] ?? 'test';
        } else {
            // Default configuration jika config.php tidak ada
            $this->host = 'localhost';
            $this->user = 'root';
            $this->password = '';
            $this->db_name = 'test';
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getAll($table, $where = null, $limit = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        
        $result = $this->conn->query($sql);
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            $columns = [];
            $values = [];
            foreach ($data as $key => $val) {
                $columns[] = $this->conn->real_escape_string($key);
                $values[] = "'" . $this->conn->real_escape_string($val) . "'";
            }
            $columns_str = implode(",", $columns);
            $values_str = implode(",", $values);
            $sql = "INSERT INTO " . $table . " (" . $columns_str . ") VALUES (" . $values_str . ")";
            return $this->conn->query($sql);
        }
        return false;
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = $key . "='" . $this->conn->real_escape_string($val) . "'";
            }
            $update_value = implode(",", $update_value);
        }
        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        return $this->conn->query($sql);
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM " . $table . " WHERE " . $where;
        return $this->conn->query($sql);
    }

    public function getLastInsertId()
    {
        return $this->conn->insert_id;
    }

    public function close()
    {
        $this->conn->close();
    }

    public function __destruct()
    {
        $this->close();
    }
}
?>