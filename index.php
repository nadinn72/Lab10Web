<?php
require_once "barang.php";
$barang = new Barang();
$rows = $barang->all();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Data Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <div>
        <h1>Manajemen Data Barang</h1>
        <p class="muted">CRUD modular (Form + Database class library) dengan OOP.</p>
      </div>
      <div class="header-actions">
        <a class="btn btn-ghost" href="form_input.php">Contoh Form Mahasiswa</a>
        <a class="btn btn-primary" href="barang_form.php">+ Tambah Barang</a>
      </div>
    </div>

    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th style="width:80px;">ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th style="width:160px;">Harga</th>
            <th style="width:120px;">Stok</th>
            <th style="width:220px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($rows) === 0): ?>
            <tr>
              <td colspan="6" class="muted" style="text-align:center; padding:18px;">
                Data masih kosong. Klik “Tambah Barang”.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($rows as $r): ?>
              <tr>
                <td><?= (int)$r["id"]; ?></td>
                <td><?= htmlspecialchars($r["kode"]); ?></td>
                <td><?= htmlspecialchars($r["nama"]); ?></td>
                <td>Rp <?= number_format((int)$r["harga"], 0, ",", "."); ?></td>
                <td><?= (int)$r["stok"]; ?></td>
                <td class="actions-inline">
                  <a class="btn btn-small btn-ghost" href="barang_form.php?id=<?= (int)$r["id"]; ?>">Edit</a>
                  <a class="btn btn-small btn-danger" href="barang_hapus.php?id=<?= (int)$r["id"]; ?>"
                     onclick="return confirm('Hapus data ini?');">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <p class="footer muted">
      Tips: Universitas Pelita Bangsa (Praktikum 10).
    </p>
  </div>
</body>
</html>
