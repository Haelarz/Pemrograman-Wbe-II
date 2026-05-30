<?php 

require_once __DIR__ . '/../../models/model.php';

if (isset($_GET['id_hapus'])) {     
    deletePeminjaman($_GET['id_hapus']);     
    header('Location: peminjaman.php');     
    exit; 
}
$daftar_peminjaman = getAllPeminjaman(); 
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title>Data Peminjaman</title>     
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
    <h2>Daftar Peminjaman Perpustakaan</h2>    
    <a href="../index.php" class="btn btn-kembali">Kembali</a>     
    <a href="formpeminjaman.php" class="btn btn-tambah">Tambah Transaksi Peminjaman</a>     
    <table>         
        <tr>             
            <th>ID Peminjaman</th>             
            <th>Tanggal Pinjam</th>             
            <th>Tanggal Kembali</th>             
            <th>Nama Member</th>             
            <th>Judul Buku</th>             
            <th>Opsi</th>         
        </tr>         
        <?php foreach ($daftar_peminjaman as $p): ?>         
        <tr>             
            <td><?= $p['id_peminjaman']; ?></td>             
            <td><?= $p['tgl_pinjam']; ?></td>             
            <td><?= $p['tgl_kembali']; ?></td>             
            <td><?= htmlspecialchars($p['nama_member'] ?? 'N/A (Terhapus)'); ?></td>             
            <td><?= htmlspecialchars($p['judul_buku'] ?? 'N/A (Terhapus)'); ?></td>             
            <td>                 
                <a href="formpeminjaman.php?id_ubah=<?= $p['id_peminjaman']; ?>" class="btn btn-ubah">Ubah</a>                 
                <a href="peminjaman.php?id_hapus=<?= $p['id_peminjaman']; ?>" class="btn btn-hapus" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>             
            </td>         
        </tr>         
        <?php endforeach; ?>     
    </table> 
</body> 
</html>