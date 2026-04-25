<form method="POST">
    Nilai: <input type="number" name="nilai" required><br>
    <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $n = $_POST['nilai'];
    echo "<h3>Hasil: ";
    if ($n == 0) echo "Nol";
    elseif ($n > 0 && $n < 10) echo "Satuan";
    elseif ($n >= 11 && $n < 20) echo "Belasan";
    elseif ($n == 10 || ($n >= 20 && $n < 100)) echo "Puluhan";
    elseif ($n >= 100 && $n < 1000) echo "Ratusan";
    else echo "Anda menginput melebihi limit bilangan";
    echo "</h3>";
}
?>