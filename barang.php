<?php
require_once "database.php";

class Barang extends Database
{
    private string $table = "barang";

    public function all(): array
    {
        $rows = [];
        $res = $this->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        if ($res) {
            while ($r = $res->fetch_assoc()) $rows[] = $r;
        }
        return $rows;
    }

    public function find(int $id): ?array
    {
        $stmt = $this->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->prepare("INSERT INTO {$this->table} (kode, nama, harga, stok) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $data["kode"], $data["nama"], $data["harga"], $data["stok"]);
        return $stmt->execute();
    }

    public function updateById(int $id, array $data): bool
    {
        $stmt = $this->prepare("UPDATE {$this->table} SET kode=?, nama=?, harga=?, stok=? WHERE id=?");
        $stmt->bind_param("ssiii", $data["kode"], $data["nama"], $data["harga"], $data["stok"], $id);
        return $stmt->execute();
    }

    public function deleteById(int $id): bool
    {
        $stmt = $this->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
