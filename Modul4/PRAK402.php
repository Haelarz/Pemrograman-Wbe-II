<?php

$mahasiswa = [
    ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $nilai_akhir = ($mahasiswa[$i]["uts"] * 0.4) + ($mahasiswa[$i]["uas"] * 0.6);
    $mahasiswa[$i]["akhir"] = $nilai_akhir;

    if ($nilai_akhir >= 80) {
        $huruf = "A";
    } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 79.99) {
        $huruf = "B";
    } elseif ($nilai_akhir >= 60 && $nilai_akhir <= 69.99) {
        $huruf = "C";
    } elseif ($nilai_akhir >= 50 && $nilai_akhir <= 59.99) {
        $huruf = "D";
    } else {
        $huruf = "E";
    }
    $mahasiswa[$i]["huruf"] = $huruf;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK402</title>
    <style>
        table { border-collapse: collapse; width: 50%; text-align: left; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $mhs["nama"] ?></td>
                <td><?= $mhs["nim"] ?></td>
                <td><?= $mhs["uts"] ?></td>
                <td><?= $mhs["uas"] ?></td>
                <td><?= $mhs["akhir"] ?></td>
                <td><?= $mhs["huruf"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>