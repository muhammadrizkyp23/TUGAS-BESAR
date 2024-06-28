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
    <title>Edit Karyawan</title>
</head>
<body>
<header>
    <div class="container">
        <h1>Edit Karyawan</h1>
    </div>
</header>

<div class="container">
    <h2 class="lama">Update dan Edit Karyawan</h2>
    <?php
    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM karyawan WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $sql = "UPDATE karyawan SET nama='$nama' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Data karyawan berhasil diperbarui";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: index.php");
    }
    ?>
    <form action="edit_employee.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
        <input type="submit" value="Perbarui Karyawan">
    </form>
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