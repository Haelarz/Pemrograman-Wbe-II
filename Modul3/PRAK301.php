<form action="" method="POST">
    Jumlah Peserta: <input type="number" name="jumlah"> <br>
    <button type="submit" name="cetak">Cetak</button>
</form>

<?php
if (isset($_POST['cetak'])) {
    $jumlah = $_POST['jumlah'];
    $i = 1;
    while ($i <= $jumlah) {
        if ($i % 2 == 0) {
            echo "<h3 style='color: green;'>Peserta ke-$i</h3>";
        } else {
            echo "<h3 style='color: red;'>Peserta ke-$i</h3>";
        }
        $i++;
    }
}
?>