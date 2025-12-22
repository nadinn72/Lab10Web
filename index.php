<?php
// File: index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Examples</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            width: 100%;
        }
        
        .header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }
        
        .header h1 {
            font-size: 3em;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .header p {
            font-size: 1.2em;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .apps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .app-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .app-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .app-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            border-color: #2575fc;
        }
        
        .app-icon {
            font-size: 3.5em;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
            transition: transform 0.3s ease;
        }
        
        .app-card:hover .app-icon {
            transform: rotate(10deg) scale(1.1);
        }
        
        .app-title {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: 700;
        }
        
        .app-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 1.05em;
        }
        
        .app-features {
            list-style: none;
            text-align: left;
            margin-top: 20px;
        }
        
        .app-features li {
            padding: 8px 0;
            color: #555;
            display: flex;
            align-items: center;
        }
        
        .app-features i {
            color: #2575fc;
            margin-right: 10px;
            width: 20px;
        }
        
        .btn-access {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        
        .btn-access:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 117, 252, 0.3);
        }
        
        .footer {
            text-align: center;
            margin-top: 50px;
            color: rgba(255,255,255,0.8);
            font-size: 0.9em;
        }
        
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.2em;
            }
            
            .apps-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-code"></i> PHP OOP Examples</h1>
            <p>Kumpulan contoh implementasi Object-Oriented Programming dengan PHP yang telah dimodernisasi dengan desain menarik</p>
        </div>
        
        <div class="apps-grid">
            <a href="form_input.php" class="app-card">
                <div class="app-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h2 class="app-title">Form Mahasiswa</h2>
                <p class="app-description">Sistem input data mahasiswa dengan validasi dan tampilan modern</p>
                <ul class="app-features">
                    <li><i class="fas fa-check"></i> Form input dengan validasi</li>
                    <li><i class="fas fa-check"></i> Penyimpanan ke database</li>
                    <li><i class="fas fa-check"></i> Tampilan data dalam tabel</li>
                    <li><i class="fas fa-check"></i> Desain responsif</li>
                </ul>
                <span class="btn-access">Akses Aplikasi</span>
            </a>
            
            <a href="mobil.php" class="app-card">
                <div class="app-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h2 class="app-title">Demo Class Mobil</h2>
                <p class="app-description">Implementasi class dan object dengan konsep OOP dasar</p>
                <ul class="app-features">
                    <li><i class="fas fa-check"></i> Contoh class dan object</li>
                    <li><i class="fas fa-check"></i> Method chaining</li>
                    <li><i class="fas fa-check"></i> Encapsulation</li>
                    <li><i class="fas fa-check"></i> Tampilan visual menarik</li>
                </ul>
                <span class="btn-access">Akses Aplikasi</span>
            </a>
            
            <div class="app-card">
                <div class="app-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h2 class="app-title">Database Class</h2>
                <p class="app-description">Class database wrapper dengan metode CRUD lengkap</p>
                <ul class="app-features">
                    <li><i class="fas fa-check"></i> Koneksi database</li>
                    <li><i class="fas fa-check"></i> CRUD operations</li>
                    <li><i class="fas fa-check"></i> Security enhancement</li>
                    <li><i class="fas fa-check"></i> Error handling</li>
                </ul>
                <a href="#" class="btn-access" onclick="showCode('database')">Lihat Kode</a>
            </div>
            
            <div class="app-card">
                <div class="app-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h2 class="app-title">Form Generator</h2>
                <p class="app-description">Class untuk generate form HTML dengan berbagai style</p>
                <ul class="app-features">
                    <li><i class="fas fa-check"></i> Multiple form styles</li>
                    <li><i class="fas fa-check"></i> Custom CSS</li>
                    <li><i class="fas fa-check"></i> Responsive design</li>
                    <li><i class="fas fa-check"></i> Easy customization</li>
                </ul>
                <a href="#" class="btn-access" onclick="showCode('form')">Lihat Kode</a>
            </div>
        </div>
        
        <div class="footer">
            <p>© 2024 PHP OOP Examples | Dibuat dengan <i class="fas fa-heart" style="color:#ff4757;"></i> untuk pembelajaran</p>
        </div>
    </div>
    
    <script>
        function showCode(type) {
            const codeContent = {
                'database': `// Database Class
// Fitur: Koneksi database, CRUD operations, error handling
// Keamanan: Prepared statements (suggestion), escaping strings`,
                'form': `// Form Class
// Fitur: Generate form HTML, multiple styles, responsive design
// Customization: CSS classes, field types, validation`
            };
            
            alert(codeContent[type] || 'Kode tidak tersedia');
            return false;
        }
    </script>
</body>
</html>