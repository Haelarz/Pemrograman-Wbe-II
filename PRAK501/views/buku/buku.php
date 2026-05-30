<?php 

require_once __DIR__ . '/../../models/model.php';

if (isset($_GET['id_hapus'])) {     
    deleteBuku($_GET['id_hapus']);     
    header('Location: buku.php');     
    exit; 
}
$daftar_buku = getAllBuku(); 
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title>Data Buku - Perpustakaan</title>     
    <style>         
        body { font-family: Arial, sans-serif; margin: 30px; }         
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }         
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }         
        th { background-color: #f2f2f2; }         
        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; }         
        .btn-tambah { background-color: #28a745; display: inline-block; margin-bottom: 15px; }         
        .btn-ubah { background-color: #ffc107; color: black; }         
        .btn-hapus { background-color: #dc3545; }         
        .btn-kembali { background-color: #6c757d; }     
    </style> 
</head> 
<body>     
    <h2>Daftar Buku Perpustakaan Egg</h2>   
    <a href="../index.php" class="btn btn-kembali">Kembali</a>     
    <a href="formbuku.php" class="btn btn-tambah">Tambah Data Buku</a>     
    <table>         
        <tr>             
            <th>ID Buku</th>             
            <th>Judul Buku</th>             
            <th>Penulis</th>             
            <th>Penerbit</th>             
            <th>Tahun Terbit</th>             
            <th>Opsi</th>         
        </tr>         
        <?php foreach ($daftar_buku as $buku): ?>         
        <tr>             
            <td><?= $buku['id_buku']; ?></td>             
            <td><?= htmlspecialchars($buku['judul_buku']); ?></td>             
            <td><?= htmlspecialchars($buku['penulis']); ?></td>             
            <td><?= htmlspecialchars($buku['penerbit']); ?></td>             
            <td><?= $buku['tahun_terbit']; ?></td>             
            <td>                 
                <a href="formbuku.php?id_ubah=<?= $buku['id_buku']; ?>" class="btn btn-ubah">Ubah</a>                 
                <a href="buku.php?id_hapus=<?= $buku['id_buku']; ?>" class="btn btn-hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>             
            </td>         
        </tr>         
        <?php endforeach; ?>     
    </table> 
</body> 
</html>