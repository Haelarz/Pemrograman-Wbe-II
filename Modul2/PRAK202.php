<?php
$errorName = $errorNim = $errorGender = "";
$name = $nim = $gender = "";

if(isset($_POST['submit'])) {
    if(empty($_POST['name'])) {
        $errorName = "Nama tidak boleh kosong";
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['nim'])) {
        $errorNim = "NIM tidak boleh kosong";
    } else {
        $nim = $_POST['nim'];
    }

    if(empty($_POST['gender'])) {
        $errorGender = "Jenis kelamin tidak boleh kosong";
    } else {
        $gender = $_POST['gender'];
    }
}
?>
<form method="POST">
    Nama: <input type="text" name="name" value="<?= $name ?>"><span style="color: red;">* <?php echo $errorName; ?></span><br>
    NIM: <input type="text" name="nim" value="<?= $nim ?>"><span style="color: red;">* <?php echo $errorNim; ?></span><br>
    Jenis Kelamin: <span style="color: red;">* <?php echo $errorGender; ?></span><br>
    <input type="radio" name="gender" value="Laki-laki"> Laki-laki <?php if($gender == "Laki-laki") echo "checked"; ?> <br>
    <input type="radio" name="gender" value="Perempuan"> Perempuan <?php if($gender == "Perempuan") echo "checked"; ?> <br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (!empty($name) && !empty($nim) && !empty($gender)){
    echo "<h3>Output:</h3>";
    echo "$name <br> $nim <br> $gender";
}