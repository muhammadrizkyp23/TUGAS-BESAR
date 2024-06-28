<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Karyawan</title>
</head>
<body>
<header>
    <div class="container">
        <h1>Tambah Karyawan</h1>
    </div>
</header>

<div class="container">
    <h2 class="lama">Silahkan Tambah Karyawan</h2>
    <form action="add_employee.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <input type="submit" value="Tambah Karyawan">
    </form>
</div>
<div class="haha">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';

        $nama = $_POST['nama'];
        $sql = "INSERT INTO karyawan (nama) VALUES ('$nama')";

        if ($conn->query($sql) === TRUE) {
            echo "Karyawan baru berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</div>
<div class="baru">
        <nav>
            <a href="index.php">Daftar Karyawan</a>
        </nav>
</div>
<div class="yuhu"> 
        <nav>
            <a href="logout.php">Logout</a>
        </nav>
</div>
<footer>
    <p>Pendataan Karyawan</p>
</footer>
</body>
</html>