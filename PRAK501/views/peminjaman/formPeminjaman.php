<?php 
require_once __DIR__ . '/../../models/model.php';

$id_ubah = isset($_GET['id_ubah']) ? $_GET['id_ubah'] : null;
$peminjaman = null;

if ($id_ubah) {     
    $peminjaman = getPeminjamanById($id_ubah);
}
$list_member = getAllMember();
$list_buku = getAllBuku();

if (isset($_POST['simpan'])) {     
    $tgl_pinjam = $_POST['tgl_pinjam'];     
    $tgl_kembali = $_POST['tgl_kembali'];     
    $id_member = $_POST['id_member'];     
    $id_buku = $_POST['id_buku'];     
    if ($id_ubah) {         
        updatePeminjaman($id_ubah, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);     
    } else {         
        insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku);     
    }     
    header('Location: peminjaman.php');     
    exit; 
}
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title><?= $id_ubah ? 'Edit Transaksi' : 'Tambah Transaksi'; ?></title>
    <style>         
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px; 
            background-image: url('../../assets/img/image_4dc6f4.jpg'); 
            background-size: cover;          
            background-position: center;     
            background-repeat: no-repeat;    
            background-attachment: fixed;    
        }         
        .container { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 40px; 
            display: inline-block; 
            border-radius: 10px; 
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2); 
            text-align: left;
        }         
        .form-group { margin-bottom: 15px; width: 350px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="date"], select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { padding: 10px 15px; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; } 
        .btn-submit { background-color: #007bff; }
        .btn-cancel { background-color: #6c757d; text-decoration: none; display: inline-block; padding: 9px 15px; }
    </style> 
</head> 
<body>     
    <div class="container">
        <h2><?= $id_ubah ? 'Edit Transaksi Peminjaman' : 'Form Transaksi Peminjaman'; ?></h2>          
        <form action="" method="post">         
            <div class="form-group">             
                <label>Tanggal Pinjam:</label>             
                <input type="date" name="tgl_pinjam" value="<?= $peminjaman ? $peminjaman['tgl_pinjam'] : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Tanggal Kembali:</label>             
                <input type="date" name="tgl_kembali" value="<?= $peminjaman ? $peminjaman['tgl_kembali'] : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Pilih Member:</label>             
                <select name="id_member" required>                 
                    <option value="">-- Pilih Member --</option>                 
                    <?php foreach ($list_member as $m): ?>                     
                        <option value="<?= $m['id_member']; ?>" <?= ($peminjaman && $peminjaman['id_member'] == $m['id_member']) ? 'selected' : ''; ?>>                         
                            <?= htmlspecialchars($m['nama_member']); ?> (ID: <?= $m['id_member']; ?>)                     
                        </option>                 
                    <?php endforeach; ?>             
                </select>         
            </div>         
            <div class="form-group">             
                <label>Pilih Buku:</label>             
                <select name="id_buku" required>                 
                    <option value="">-- Pilih Buku --</option>                 
                    <?php foreach ($list_buku as $b): ?>                     
                        <option value="<?= $b['id_buku']; ?>" <?= ($peminjaman && $peminjaman['id_buku'] == $b['id_buku']) ? 'selected' : ''; ?>>                         
                            <?= htmlspecialchars($b['judul_buku']); ?>                     
                        </option>                 
                    <?php endforeach; ?>             
                </select>         
            </div>                  
            <button type="submit" name="simpan" class="btn btn-submit">Simpan Transaksi</button>         
            <a href="peminjaman.php" class="btn btn-cancel">Kembali</a>     
        </form> 
    </div>
</body> 
</html>