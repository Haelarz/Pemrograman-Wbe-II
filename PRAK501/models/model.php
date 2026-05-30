<?php 

require_once __DIR__ . '/../config/koneksi.php';

function getAllBuku() {     
    $conn = koneksiDatabase();     
    $query = "SELECT * FROM buku";     
    $result = mysqli_query($conn, $query);     
    $data = [];     
    while ($row = mysqli_fetch_assoc($result)) {         
        $data[] = $row;     
    }     
    mysqli_close($conn);     
    return $data; 
}

function getBukuById($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "SELECT * FROM buku WHERE id_buku = $id";     
    $result = mysqli_query($conn, $query);     
    $data = mysqli_fetch_assoc($result);     
    mysqli_close($conn);     
    return $data; 
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {     
    $conn = koneksiDatabase();     
    $judul = mysqli_real_escape_string($conn, $judul);     
    $penulis = mysqli_real_escape_string($conn, $penulis);     
    $penerbit = mysqli_real_escape_string($conn, $penerbit);     
    $tahun = mysqli_real_escape_string($conn, $tahun);          
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul', '$penulis', '$penerbit', $tahun)";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $judul = mysqli_real_escape_string($conn, $judul);     
    $penulis = mysqli_real_escape_string($conn, $penulis);     
    $penerbit = mysqli_real_escape_string($conn, $penerbit);     
    $tahun = mysqli_real_escape_string($conn, $tahun);     
    $query = "UPDATE buku SET judul_buku='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit=$tahun WHERE id_buku=$id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function deleteBuku($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "DELETE FROM buku WHERE id_buku = $id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function getAllMember() {     
    $conn = koneksiDatabase();     
    $query = "SELECT * FROM member";     
    $result = mysqli_query($conn, $query);     
    $data = [];     
    while ($row = mysqli_fetch_assoc($result)) {         
        $data[] = $row;     
    }     
    mysqli_close($conn);     
    return $data; 
}

function getMemberById($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "SELECT * FROM member WHERE id_member = $id";     
    $result = mysqli_query($conn, $query);     
    $data = mysqli_fetch_assoc($result);     
    mysqli_close($conn);     
    return $data; 
}

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {     
    $conn = koneksiDatabase();     
    $nama = mysqli_real_escape_string($conn, $nama);     
    $nomor = mysqli_real_escape_string($conn, $nomor);     
    $alamat = mysqli_real_escape_string($conn, $alamat);     
    $query = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES ('$nama', '$nomor', '$alamat', '$tgl_daftar', '$tgl_bayar')";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $nama = mysqli_real_escape_string($conn, $nama);     
    $nomor = mysqli_real_escape_string($conn, $nomor);     
    $alamat = mysqli_real_escape_string($conn, $alamat);     
    $query = "UPDATE member SET nama_member='$nama', nomor_member='$nomor', alamat='$alamat', tgl_mendaftar='$tgl_daftar', tgl_terakhir_bayar='$tgl_bayar' WHERE id_member=$id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function deleteMember($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "DELETE FROM member WHERE id_member = $id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function getAllPeminjaman() {     
    $conn = koneksiDatabase();     
    $query = "SELECT p.*, m.nama_member, b.judul_buku                
              FROM peminjaman p                
              LEFT JOIN member m ON p.id_member = m.id_member                
              LEFT JOIN buku b ON p.id_buku = b.id_buku";     
    $result = mysqli_query($conn, $query);     
    $data = [];     
    while ($row = mysqli_fetch_assoc($result)) {         
        $data[] = $row;     
    }     
    mysqli_close($conn);     
    return $data; 
}

function getPeminjamanById($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";     
    $result = mysqli_query($conn, $query);     
    $data = mysqli_fetch_assoc($result);     
    mysqli_close($conn);     
    return $data; 
}

function insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {     
    $conn = koneksiDatabase();     
    $id_member = empty($id_member) ? "NULL" : intval($id_member);     
    $id_buku = empty($id_buku) ? "NULL" : intval($id_buku);     
    $query = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES ('$tgl_pinjam', '$tgl_kembali', $id_member, $id_buku)";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $id_member = empty($id_member) ? "NULL" : intval($id_member);     
    $id_buku = empty($id_buku) ? "NULL" : intval($id_buku);     
    $query = "UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', id_member=$id_member, id_buku=$id_buku WHERE id_peminjaman=$id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}

function deletePeminjaman($id) {     
    $conn = koneksiDatabase();     
    $id = mysqli_real_escape_string($conn, $id);     
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";     
    $result = mysqli_query($conn, $query);     
    mysqli_close($conn);     
    return $result; 
}
?>