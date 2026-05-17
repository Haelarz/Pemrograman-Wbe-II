<?php
$krs_mahasiswa = [
    [
        "no" => 1,
        "nama" => "Ridho",
        "mk" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2,
        "nama" => "Ratna",
        "mk" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3,
        "nama" => "Tono",
        "mk" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

// Hitung total SKS dan keterangan
foreach ($krs_mahasiswa as $key => $mhs) {
    $total_sks = 0;
    foreach ($mhs['mk'] as $mk) {
        $total_sks += $mk['sks'];
    }
    $krs_mahasiswa[$key]['total_sks'] = $total_sks;
    $krs_mahasiswa[$key]['keterangan'] = ($total_sks < 7) ? "Revisi KRS" : "Tidak Revisi";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403 - Monitoring KRS</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f2f2f2; }
        .revisi { background-color: #f8d7da; color: #721c24; } /* Warna merah */
        .aman { background-color: #d4edda; color: #155724; }   /* Warna hijau */
    </style>
</head>
<body>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($krs_mahasiswa as $mhs): ?>
            <?php for ($j = 0; $j < count($mhs["mk"]); $j++): ?>
                <tr>
                    <?php if ($j == 0) : ?>
                        <td><?= $mhs["no"] ?></td>
                        <td><?= htmlspecialchars($mhs["nama"]) ?></td>
                        <td><?= htmlspecialchars($mhs["mk"][$j]["nama_mk"]) ?></td>
                        <td><?= htmlspecialchars($mhs["mk"][$j]["sks"]) ?></td>
                        <td><?= htmlspecialchars($mhs["total_sks"]) ?></td>
                        <td class="<?= ($mhs['total_sks'] < 7) ? 'revisi' : 'aman' ?>">
                            <?= htmlspecialchars($mhs["keterangan"]) ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td><?= htmlspecialchars($mhs["mk"][$j]["nama_mk"]) ?></td>
                        <td><?= htmlspecialchars($mhs["mk"][$j]["sks"]) ?></td>
                        <td></td>
                        <td></td>
                    <?php endif; ?>
                </tr>
            <?php endfor; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>