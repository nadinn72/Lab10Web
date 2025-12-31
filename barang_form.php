<?php
require_once "barang.php";

$barang = new Barang();

$id    = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
$kode  = trim($_POST["kode"] ?? "");
$nama  = trim($_POST["nama"] ?? "");
$harga = (int)($_POST["harga"] ?? 0);
$stok  = (int)($_POST["stok"] ?? 0);

if ($kode === "" || $nama === "") {
    die("Kode dan Nama wajib diisi. <a href='index.php'>Kembali</a>");
}

$data = [
  "kode" => $kode,
  "nama" => $nama,
  "harga" => $harga,
  "stok" => $stok
];

$ok = false;
if ($id > 0) {
    $ok = $barang->updateById($id, $data);
} else {
    $ok = $barang->create($data);
}

if ($ok) {
    header("Location: index.php");
    exit;
}

die("Gagal menyimpan data. <a href='index.php'>Kembali</a>");
