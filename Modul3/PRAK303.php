<form action="" method="POST">
    Batas Bawah: <input type="number" name="bawah"> <br>
    Batas Atas: <input type="number" name="atas"> <br>
    <button type="submit" name="cetak">Cetak</button>
</form>

<?php
if (isset($_POST['cetak'])) {
    $bawah = $_POST['bawah'];
    $atas = $_POST['atas'];
    $i = $bawah;

    do {
        if (($i + 7) % 5 == 0) {
            echo "<a href=''><img src='Gambar/starr.png' width='20px'> </a>";
        } else {
            echo "$i ";
        }
        $i++;
    } while ($i <= $atas);
}
?>