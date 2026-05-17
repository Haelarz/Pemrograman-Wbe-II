<?php

$panjang = "";
$lebar = "";
$nilai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK401</title>
    <style>
        table { border-collapse: collapse; margin-top: 10px; }
        td { border: 1px solid black; padding: 5px 15px; text-align: center; }
    </style>
</head>
<body>
    <form method="POST">
        Panjang: <input type="text" name="panjang" value="<?= $panjang ?>"><br>
        Lebar: <input type="text" name="lebar" value="<?= $lebar ?>"><br>
        Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php

    if (isset($_POST['cetak'])) {
        $arr_nilai = explode(" ", $nilai);
        
        $total_elemen = $panjang * $lebar;

        if (count($arr_nilai) == $total_elemen) {
            $index = 0;
            
            echo "<table>"; 
            
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>"; 
                
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $arr_nilai[$index] . "</td>";
                    
                    $index++; 
                }
                echo "</tr>"; 
            }
            echo "</table>"; 
            
        } else {
            echo "<br><b>Panjang nilai tidak sesuai dengan ukuran matriks</b>";
        }
    }
    ?>
</body>
</html>