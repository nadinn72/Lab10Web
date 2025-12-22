<?php
// File: mobil.php
class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct($merk = "BMW", $warna = "Biru", $harga = "10000000")
    {
        $this->merk = $merk;
        $this->warna = $warna;
        $this->harga = $harga;
    }

    public function gantiWarna($warnaBaru)
    {
        $this->warna = $warnaBaru;
        return $this;
    }

    public function gantiMerk($merkBaru)
    {
        $this->merk = $merkBaru;
        return $this;
    }

    public function gantiHarga($hargaBaru)
    {
        $this->harga = $hargaBaru;
        return $this;
    }

    public function getInfo()
    {
        return [
            'merk' => $this->merk,
            'warna' => $this->warna,
            'harga' => $this->harga
        ];
    }

    public function tampilWarna()
    {
        return $this->warna;
    }
    
    public function tampilMerk()
    {
        return $this->merk;
    }
    
    public function tampilHarga()
    {
        return "Rp " . number_format($this->harga, 0, ',', '.');
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Class Mobil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }
        
        .header h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        
        .header p {
            font-size: 1.2em;
            opacity: 0.9;
        }
        
        .mobil-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        
        .mobil-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 350px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .mobil-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        }
        
        .mobil-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f1f1;
        }
        
        .mobil-icon {
            font-size: 2.5em;
            color: #0984e3;
            margin-right: 15px;
        }
        
        .mobil-title {
            font-size: 1.8em;
            color: #2d3436;
            margin: 0;
        }
        
        .mobil-info {
            margin-bottom: 25px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: background 0.3s ease;
        }
        
        .info-item:hover {
            background: #e9ecef;
        }
        
        .info-icon {
            width: 30px;
            color: #0984e3;
            font-size: 1.2em;
        }
        
        .info-label {
            font-weight: 600;
            width: 80px;
            color: #555;
        }
        
        .info-value {
            flex: 1;
            font-weight: 500;
            color: #333;
        }
        
        .color-indicator {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
            border: 2px solid rgba(0,0,0,0.1);
        }
        
        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
            justify-content: center;
        }
        
        .btn-primary {
            background: #0984e3;
            color: white;
        }
        
        .btn-primary:hover {
            background: #0770c4;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #00b894;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #00a085;
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background: #fdcb6e;
            color: #000;
        }
        
        .btn-warning:hover {
            background: #f9c855;
            transform: translateY(-2px);
        }
        
        .output-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        
        .output-title {
            font-size: 1.8em;
            color: #2d3436;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #0984e3;
        }
        
        .output-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
        }
        
        @media (max-width: 768px) {
            .mobil-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-car"></i> Demo Class Mobil</h1>
            <p>Contoh implementasi Object-Oriented Programming dengan PHP</p>
        </div>
        
        <div class="mobil-container">
            <?php
            // membuat objek mobil
            $mobil1 = new Mobil("Toyota", "Hitam", 250000000);
            $mobil2 = new Mobil("Honda", "Putih", 300000000);
            $mobil3 = new Mobil("Suzuki", "Merah", 200000000);
            
            $mobilList = [$mobil1, $mobil2, $mobil3];
            
            foreach ($mobilList as $index => $mobil):
                $info = $mobil->getInfo();
                $colorMap = [
                    'Biru' => '#0984e3',
                    'Hitam' => '#2d3436',
                    'Putih' => '#dfe6e9',
                    'Merah' => '#d63031',
                    'Hijau' => '#00b894',
                    'Kuning' => '#fdcb6e',
                    'Silver' => '#b2bec3'
                ];
                $colorCode = $colorMap[$info['warna']] ?? '#0984e3';
            ?>
            <div class="mobil-card">
                <div class="mobil-header">
                    <i class="fas fa-car mobil-icon"></i>
                    <h2 class="mobil-title">Mobil <?php echo $index + 1; ?></h2>
                </div>
                
                <div class="mobil-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div class="info-label">Merk:</div>
                        <div class="info-value"><?php echo $info['merk']; ?></div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="info-label">Warna:</div>
                        <div class="info-value">
                            <span class="color-indicator" style="background: <?php echo $colorCode; ?>"></span>
                            <?php echo $info['warna']; ?>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="info-label">Harga:</div>
                        <div class="info-value">Rp <?php echo number_format($info['harga'], 0, ',', '.'); ?></div>
                    </div>
                </div>
                
                <div class="actions">
                    <button class="btn btn-primary" onclick="ubahWarna(<?php echo $index; ?>)">
                        <i class="fas fa-paint-brush"></i> Ubah Warna
                    </button>
                    <button class="btn btn-secondary" onclick="ubahMerk(<?php echo $index; ?>)">
                        <i class="fas fa-exchange-alt"></i> Ubah Merk
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="output-section">
            <h2 class="output-title"><i class="fas fa-code"></i> Output Program</h2>
            <div class="output-content">
                <?php
                echo "<strong>Mobil Pertama:</strong><br>";
                echo "Warna awal: " . $mobil1->tampilWarna() . "<br>";
                $mobil1->gantiWarna("Biru Metalik");
                echo "Setelah ganti warna: " . $mobil1->tampilWarna() . "<br><br>";
                
                echo "<strong>Mobil Kedua:</strong><br>";
                echo "Merk awal: " . $mobil2->tampilMerk() . "<br>";
                $mobil2->gantiMerk("Mitsubishi");
                echo "Setelah ganti merk: " . $mobil2->tampilMerk() . "<br><br>";
                
                echo "<strong>Mobil Ketiga:</strong><br>";
                echo "Harga awal: " . $mobil3->tampilHarga() . "<br>";
                $mobil3->gantiHarga(225000000);
                echo "Setelah ganti harga: " . $mobil3->tampilHarga() . "<br><br>";
                
                echo "<strong>Method Chaining Example:</strong><br>";
                $mobil4 = new Mobil();
                $mobil4->gantiMerk("Tesla")
                       ->gantiWarna("Putih Pearl")
                       ->gantiHarga(1500000000);
                echo "Mobil 4 - Merk: " . $mobil4->tampilMerk() . 
                     ", Warna: " . $mobil4->tampilWarna() . 
                     ", Harga: " . $mobil4->tampilHarga();
                ?>
            </div>
        </div>
    </div>
    
    <script>
        function ubahWarna(index) {
            const colors = ['Biru', 'Merah', 'Hijau', 'Kuning', 'Hitam', 'Putih', 'Silver'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            alert(`Mobil ${index + 1} akan diubah warnanya menjadi: ${randomColor}`);
            // Dalam implementasi real, ini akan mengirim request ke server
        }
        
        function ubahMerk(index) {
            const merks = ['Toyota', 'Honda', 'Suzuki', 'Mitsubishi', 'Nissan', 'BMW', 'Mercedes'];
            const randomMerk = merks[Math.floor(Math.random() * merks.length)];
            alert(`Mobil ${index + 1} akan diubah merke menjadi: ${randomMerk}`);
            // Dalam implementasi real, ini akan mengirim request ke server
        }
    </script>
</body>
</html>