<form action="" method="POST">
    <input type="text" name="teks">
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $teks = $_POST['teks'];
    $panjang = strlen($teks);
    $arr = str_split($teks);

    foreach ($arr as $karakter) {
        echo strtoupper($karakter);
        for ($i = 1; $i < $panjang; $i++) {
            echo strtolower($karakter);
        }
    }
}
?>