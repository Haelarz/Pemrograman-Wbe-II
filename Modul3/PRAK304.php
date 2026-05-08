<?php
$jumlah = $_POST['jumlah'] ?? 0;

if (isset($_POST['tambah'])) $jumlah++;
if (isset($_POST['kurang']) && $jumlah > 0) $jumlah--;

if ($jumlah == 0): ?>
    <form action="" method="POST">
        Jumlah bintang <input type="number" name="jumlah"> <br>
        <button type="submit" name="submit">Submit</button>
    </form>
<?php else: ?>
    <p>Jumlah bintang <?= $jumlah ?></p>
    <?php 
    for ($i = 0; $i < $jumlah; $i++) {
        echo "<a href=''><img src='Gambar/starr.png' width='50px'></a>";
    }
    ?>
    <form action="" method="POST">
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>
<?php endif; ?>