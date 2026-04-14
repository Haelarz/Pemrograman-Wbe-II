<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; }
    </style>
</head>
<body>
    <?php
    $samsung = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"]; 
    ?>
    <table>
        <tr><th>Daftar Smartphone Samsung</th></tr>
        <?php foreach ($samsung as $hp) : ?>
            <tr><td><?php echo $hp; ?></td></tr>
        <?php endforeach; ?>
    </table>
</body>
</html>