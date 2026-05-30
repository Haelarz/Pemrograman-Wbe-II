<?php 
require_once __DIR__ . '/../../models/model.php';

$id_ubah = isset($_GET['id_ubah']) ? $_GET['id_ubah'] : null;
$member = null;

if ($id_ubah) {     
    $member = getMemberById($id_ubah);
}

if (isset($_POST['simpan'])) {     
    $nama = $_POST['nama_member'];     
    $nomor = $_POST['nomor_member'];     
    $alamat = $_POST['alamat'];     
    $tgl_daftar = $_POST['tgl_mendaftar'];     
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];     
    if ($id_ubah) {         
        updateMember($id_ubah, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);     
    } else {         
        insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);     
    }     
    header('Location: member.php');     
    exit; 
}
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title><?= $id_ubah ? 'Edit Member' : 'Tambah Member'; ?></title>
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
        input[type="text"], input[type="datetime-local"], input[type="date"], textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; } 
        .btn { padding: 10px 15px; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; } 
        .btn-submit { background-color: #007bff; }
        .btn-cancel { background-color: #6c757d; text-decoration: none; display: inline-block; padding: 9px 15px; }
    </style> 
</head> 
<body>     
    <div class="container">
        <h2><?= $id_ubah ? 'Edit Data Member' : 'Form Penambahan Member'; ?></h2>          
        <form action="" method="post">         
            <div class="form-group">             
                <label>Nama Member:</label>             
                <input type="text" name="nama_member" value="<?= $member ? htmlspecialchars($member['nama_member']) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Nomor Member:</label>             
                <input type="text" name="nomor_member" value="<?= $member ? htmlspecialchars($member['nomor_member']) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Alamat:</label>             
                <textarea name="alamat" rows="3" required><?= $member ? htmlspecialchars($member['alamat']) : ''; ?></textarea>         
            </div>         
            <div class="form-group">             
                <label>Tanggal Mendaftar:</label>             
                <input type="datetime-local" name="tgl_mendaftar" value="<?= $member ? date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) : ''; ?>" required>         
            </div>         
            <div class="form-group">             
                <label>Tanggal Terakhir Bayar:</label>             
                <input type="date" name="tgl_terakhir_bayar" value="<?= $member ? $member['tgl_terakhir_bayar'] : ''; ?>" required>         
            </div>                  
            <button type="submit" name="simpan" class="btn btn-submit">Simpan</button>         
            <a href="member.php" class="btn btn-cancel">Kembali</a>     
        </form> 
    </div>
</body> 
</html>