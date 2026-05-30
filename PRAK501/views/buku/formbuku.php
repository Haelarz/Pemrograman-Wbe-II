<?php 
require_once __DIR__ . '/../../models/model.php';

$id_ubah = isset($_GET['id_ubah']) ? $_GET['id_ubah'] : null;
$buku = null;

if ($id_ubah) {     
    $buku = getBukuById($id_ubah);
}

if (isset($_POST['simpan'])) {     
    $judul = $_POST['judul_buku'];     
    $penulis = $_POST['penulis'];     
    $penerbit = $_POST['penerbit'];     
    $tahun = $_POST['tahun_terbit'];     
    if ($id_ubah) {         
        updateBuku($id_ubah, $judul, $penulis, $penerbit, $tahun);     
    } else {         
        insertBuku($judul, $penulis, $penerbit, $tahun);     
    }     
    header('Location: buku.php');     
    exit; 
}
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title><?= $id_ubah ? 'Form Edit Buku' : 'Form Tambah Buku'; ?></title>
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
        .form-group { margin-bottom: 15px; width: 300px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; } 
        .btn { padding: 10px 15px; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; } 
        .btn-submit { background-color: #007bff; }
        .btn-cancel { background-color: #6c757d; text-decoration: none; display: inline-block; padding: 9px 15px; }
    </style> 
</head> 
<body>     
    <div class="container">
        <h2><?= $id_ubah ? 'Ada yang perlu diganti di Perpustakaan Egg?' : 'Form Penambahan Buku'; ?></h2>          
        <form action="" method="post">         
            <div class="form-group">             
                <label>Judul Buku:</label>             
                <input type="text" name="judul_buku" value="<?= $buku ? htmlspecialchars($buku['judul_buku']) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Penulis:</label>             
                <input type="text" name="penulis" value="<?= $buku ? htmlspecialchars($buku['penulis']) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Penerbit:</label>             
                <input type="text" name="penerbit" value="<?= $buku ? htmlspecialchars($buku['penerbit']) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Tahun Terbit:</label>             
                <input type="number" name="tahun_terbit" value="<?= $buku ? $buku['tahun_terbit'] : ''; ?>" required>         
            </div>                  
            <button type="submit" name="simpan" class="btn btn-submit"><?= $id_ubah ? 'Ubah Data' : 'Daftar'; ?></button>         
            <a href="buku.php" class="btn btn-cancel">Kembali</a>     
        </form> 
    </div>
</body> 
</html>