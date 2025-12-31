<?php
require_once "form.php";
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <div>
        <h1>Form Mahasiswa</h1>
        <p class="muted">Contoh pemakaian class library Form (OOP).</p>
      </div>
      <a class="btn btn-ghost" href="index.php">Ke Modul Barang</a>
    </div>

    <?php
      $form = new Form("", "Input Form");
      $form->addField("txtnim", "NIM", "text", "", ["required" => "required", "placeholder" => "Contoh: 23123456"]);
      $form->addField("txtnama", "Nama", "text", "", ["required" => "required", "placeholder" => "Nama lengkap"]);
      $form->addField("txtalamat", "Alamat", "text", "", ["placeholder" => "Alamat domisili"]);
      echo "<h3>Silahkan isi form berikut ini:</h3>";
      $form->displayForm();
    ?>
  </div>
</body>
</html>
