<form action="" method="POST">
    Tinggi: <input type="number" name="tinggi"> <br>
    Alamat Gambar: <input type="text" name="url"> <br>
    <button type="submit" name="cetak">Cetak</button>
</form>

<?php
if (isset($_POST['cetak'])) {
    $tinggi = $_POST['tinggi'];
    $url = $_POST['url'];
    $i = 0;
    while ($i < $tinggi) {
        $j = 0;
        while ($j < $i) {
            echo "<img src='' style='width:50px; opacity:0;'>";
            $j++;
        }
        $k = $tinggi;
        while ($k > $i) {
            echo "<img src='$url' width='50px' height='50px'>";
            $k--;
        }
        echo "<br>";
        $i++;
    }
}
?>