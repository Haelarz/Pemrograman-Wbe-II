<?php 

require_once __DIR__ . '/../../models/model.php';

if (isset($_GET['id_hapus'])) {     
    deleteMember($_GET['id_hapus']);     
    header('Location: member.php');     
    exit; 
}
$daftar_member = getAllMember(); 
?>
<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title>Data Member</title>     
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
    <h2>Daftar Member Perpustakaan Egg</h2>    
    <a href="../index.php" class="btn btn-kembali">Kembali</a>     
    <a href="formmember.php" class="btn btn-tambah">Tambah Member</a>     
    <table>         
        <tr>             
            <th>ID Member</th>             
            <th>Nama Member</th>             
            <th>Nomor Member</th>             
            <th>Alamat</th>             
            <th>Tgl Mendaftar</th>             
            <th>Tgl Terakhir Bayar</th>             
            <th>Opsi</th>         
        </tr>         
        <?php foreach ($daftar_member as $member): ?>         
        <tr>             
            <td><?= $member['id_member']; ?></td>             
            <td><?= htmlspecialchars($member['nama_member']); ?></td>             
            <td><?= htmlspecialchars($member['nomor_member']); ?></td>             
            <td><?= htmlspecialchars($member['alamat']); ?></td>             
            <td><?= $member['tgl_mendaftar']; ?></td>             
            <td><?= $member['tgl_terakhir_bayar']; ?></td>             
            <td>                 
                <a href="formmember.php?id_ubah=<?= $member['id_member']; ?>" class="btn btn-ubah">Ubah</a>                 
                <a href="member.php?id_hapus=<?= $member['id_member']; ?>" class="btn btn-hapus" onclick="return confirm('Hapus member ini?')">Hapus</a>             
            </td>         
        </tr>         
        <?php endforeach; ?>     
    </table> 
</body> 
</html>