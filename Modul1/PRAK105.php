<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th { background-color: red; padding: 20px; font-size: 24px; }
    </style>
</head>
<body>
    <?php
    $samsung = [
        "S22" => "Samsung Galaxy S22",
        "S22P" => "Samsung Galaxy S22+",
        "A03" => "Samsung Galaxy A03",
        "XCV5" => "Samsung Galaxy Xcover 5"
    ];
    ?>
    <table>
        <tr><th>Daftar Smartphone Samsung</th></tr>
        <tr><td><?php echo $samsung["S22"]; ?></td></tr>
        <tr><td><?php echo $samsung["S22P"]; ?></td></tr>
        <tr><td><?php echo $samsung["A03"]; ?></td></tr>
        <tr><td><?php echo $samsung["XCV5"]; ?></td></tr>
    </table>
</body>
</html>