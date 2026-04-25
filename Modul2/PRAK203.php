<form method ="POST">
    Nilai: <input type="number" name="suhu" required><br>
    Dari: <br>
    <input type="radio" name="dari" value="Celcius"> Celsius <br>
    <input type="radio" name="dari" value="Fahrenheit"> Fahrenheit <br>
    <input type="radio" name="dari" value="Rheamur"> Rheamur <br>
    <input type="radio" name="dari" value="Kelvin"> Kelvin <br>
    Ke: <br>
    <input type="radio" name="ke" value="Celcius"> Celsius <br>
    <input type="radio" name="ke" value="Fahrenheit"> Fahrenheit <br>
    <input type="radio" name="ke" value="Rheamur"> Rheamur <br>
    <input type="radio" name="ke" value="Kelvin"> Kelvin <br>
    <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $suhu = $_POST['suhu'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];
    $hasil = 0;

    if ($dari == "Celcius"){
        if ($ke == "Fahrenheit") $hasil = ($suhu * 9/5) + 32;
        elseif ($ke == "Rheamur") $hasil = $suhu * 4/5;
        elseif ($ke == "Kelvin") $hasil = $suhu + 273.15;
        else $hasil = $suhu; 
    } elseif ($dari == "Fahrenheit"){
        if ($ke == "Celcius") $hasil = ($suhu - 32) * 5/9;
        elseif ($ke == "Rheamur") $hasil = ($suhu - 32) * 4/9;
        elseif ($ke == "Kelvin") $hasil = ($suhu - 32) * 5/9 + 273.15;
        else $hasil = $suhu;
    } elseif ($dari == "Rheamur"){
        if ($ke == "Celcius") $hasil = $suhu * 5/4;
        elseif ($ke == "Fahrenheit") $hasil = ($suhu * 9/4) + 32;
        elseif ($ke == "Kelvin") $hasil = ($suhu * 5/4) + 273.15;
        else $hasil = $suhu;

    } elseif ($dari == "Kelvin"){
        if ($ke == "Celcius") $hasil = $suhu - 273.15;
        elseif ($ke == "Fahrenheit") $hasil = (($suhu - 273.15) * 9/5) + 32;
        elseif ($ke == "Rheamur") $hasil = ($suhu - 273.15) * 4/5;
        else $hasil = $suhu;
    }

    echo "<h3>Hasil Konversi: $hasil °" . substr($ke, 0, 1) . "</h3>";
}

?>