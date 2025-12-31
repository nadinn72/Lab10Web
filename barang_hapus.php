<?php
require_once "barang.php";

$barang = new Barang();
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$barang->deleteById($id);
header("Location: index.php");
exit;
