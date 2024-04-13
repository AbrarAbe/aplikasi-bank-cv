<?php
include('koneksi.db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM dokumen WHERE id = $id AND tipe = 'foto'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header('Content-Type: image/jpeg');
        echo $row['dokumen'];
    } else {
        echo "Foto tidak ditemukan.";
    }
} else {
    echo "ID foto tidak valid.";
}

$koneksi->close();
?>