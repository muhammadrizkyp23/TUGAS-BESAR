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
    <title>Daftar Karyawan</title>
</head>
<body>
<header>
    <div class="container">
        <h1>Daftar Karyawan</h1>
    </div>
</header>

<div class="container">
    <h2 class="lama">Data Karyawan</h2>
    <?php
    include 'db.php';

    $sql = "SELECT id, nama FROM karyawan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td>
            <td><a href='edit_employee.php?id=".$row["id"]."'>Edit</a> | 
            <a href='delete_employee.php?id=".$row["id"]."'>Hapus</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
<div class="baru">
        <nav>
             <a href="add_employee.php">Tambah Karyawan</a>
        </nav>
</div>
<div class="yuhu"> 
        <nav>
            <a href="logout.php">Logout</a>
        </nav>
</div>
<footer>
    <p> Pendataan Karyawan</p>
</footer>
</body>
</html>