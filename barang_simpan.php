<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/database.php";
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demo Database Class</title>
  <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime(__DIR__ . '/assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Demo Database Class</h1>
      <p class="muted">Tes koneksi dan query sederhana.</p>
    </div>

    <div class="card">
      <div class="card__body">
        <?php
        try {
          $db = new Database();

          $res = $db->query("SELECT 1 AS ok");
          $row = $res ? $res->fetch_assoc() : null;

          echo "<div class='notice'><b>Koneksi:</b> Berhasil</div>";
          echo "<pre>";
          var_dump($row);
          echo "</pre>";

          echo "<div class='notice'>Jika ini muncul, berarti class Database berfungsi dan koneksi DB OK.</div>";
        } catch (Throwable $e) {
          echo "<div class='notice'><b>Error:</b> " . htmlspecialchars($e->getMessage()) . "</div>";
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
