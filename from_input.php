<?php
// File: form_input.php
include "form.php";
include "database.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    
    // Prepare data
    $data = [
        'nim' => $_POST['txtnim'] ?? '',
        'nama' => $_POST['txtnama'] ?? '',
        'alamat' => $_POST['txtalamat'] ?? ''
    ];
    
    // Insert to database
    $result = $db->insert('mahasiswa', $data);
    
    if ($result) {
        $success_message = "Data berhasil disimpan!";
    } else {
        $error_message = "Gagal menyimpan data!";
    }
    
    $db->close();
}

// Create table if not exists
function createMahasiswaTable() {
    $db = new Database();
    $sql = "CREATE TABLE IF NOT EXISTS mahasiswa (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(20) NOT NULL,
        nama VARCHAR(100) NOT NULL,
        alamat TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $db->query($sql);
    $db->close();
}

createMahasiswaTable();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        
        .header p {
            color: #666;
            font-size: 1.1em;
        }
        
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .form-section {
            flex: 1;
            min-width: 300px;
        }
        
        .data-section {
            flex: 1;
            min-width: 300px;
        }
        
        .section-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: fit-content;
        }
        
        .section-title {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
            font-size: 1.8em;
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .data-table th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        
        .data-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .data-table tr:hover {
            background: #f5f5f5;
        }
        
        .no-data {
            text-align: center;
            color: #666;
            padding: 20px;
            font-style: italic;
        }
        
        .actions {
            display: flex;
            gap: 5px;
        }
        
        .btn-action {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        
        .btn-edit {
            background: #ffc107;
            color: #000;
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-user-graduate"></i> Sistem Data Mahasiswa</h1>
            <p>Silahkan isi data mahasiswa di form berikut</p>
        </div>
        
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error_message)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <div class="content">
            <div class="form-section">
                <div class="section-card">
                    <h2 class="section-title"><i class="fas fa-edit"></i> Form Input</h2>
                    <?php
                    $form = new Form("", "Simpan Data", "POST", "modern");
                    $form->addField("txtnim", "NIM");
                    $form->addField("txtnama", "Nama Lengkap");
                    $form->addField("txtalamat", "Alamat");
                    $form->displayForm();
                    ?>
                </div>
            </div>
            
            <div class="data-section">
                <div class="section-card">
                    <h2 class="section-title"><i class="fas fa-database"></i> Data Mahasiswa</h2>
                    <div class="table-container">
                        <?php
                        $db = new Database();
                        $mahasiswa = $db->getAll('mahasiswa', null, 10);
                        $db->close();
                        
                        if (!empty($mahasiswa)):
                        ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mahasiswa as $index => $mhs): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($mhs['nim']); ?></td>
                                    <td><?php echo htmlspecialchars($mhs['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($mhs['alamat']); ?></td>
                                    <td class="actions">
                                        <button class="btn-action btn-edit"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn-action btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="no-data">
                            <i class="fas fa-info-circle"></i>
                            <p>Belum ada data mahasiswa. Silahkan input data terlebih dahulu.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Reset form setelah submit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const successAlert = document.querySelector('.alert-success');
            
            if (successAlert && form) {
                form.reset();
            }
            
            // Tambahkan animasi pada input
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-5px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>