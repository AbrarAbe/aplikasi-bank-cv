<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/abrar.css">
    <title>Detail Data Pelamar</title>
</head>
<body>
    <!-- pemanbahan div -->
    <div class="container">
    <h2>Detail Data Pelamara</h2><br>
        <!-- mengubah tampilan tombol -->
        <a class="button" href="view_data.php">Kembali ke Data Pelamar</a>
        <br><br><br>
        <?php
            // Memeriksa apakah ID pelamar disediakan melalui parameter GET
            if(isset($_GET['id'])) {
            // Mendapatkan ID pelamar dari parameter GET
            $id = $_GET['id'];

            // Memanggil koneksi ke database
            include('koneksi.db.php');

                // Menyiapkan dan menjalankan query untuk mendapatkan data pelamar berdasarkan ID
            $sql = "SELECT * FROM data_pelamar WHERE id='$id'";
            $result = $koneksi->query($sql);

            // Memeriksa apakah data ditemukan
            if ($result->num_rows > 0) {
                // Mendapatkan data pelamar
                $row = $result->fetch_assoc();
                $nama = $row['nama'];
                $email = $row['email'];
                $alamat = $row['alamat'];
                $telepon = $row['telepon'];
                $pendidikan = $row['pendidikan'];
                $universitas = $row['universitas'];
                $pengalaman = $row['pengalaman'];
                $deskripsi = $row['deskripsi']; // penambahan

        ?>
            <!-- Menampilkan formulir dengan data pelamar yang telah ditemukan -->
            <form action="proses_update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nama">Nama :</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" disabled><br>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" disabled><br>
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" name="alamat" disabled><?php echo $alamat; ?></textarea><br>
                <label for="telepon">Telepon :</label>
                <input type="text" id="telepon" name="telepon" value="<?php echo $telepon; ?>" disabled><br>
                <label for="pendidikan">Pendidikan :</label>
                <input type="text" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan; ?>" disabled><br>
                <!-- Penambahan form universitas -->
                <label for="universitas">Universitas :</label>
                <input type="text" id="universitas" name="universitas" value="<?php echo $universitas; ?>" disabled><br>
                <!-- Penambahan form Pengalaman -->
                <label for="pengalaman">Pengalaman (tahun) :</label>
                <input type="text" id="pengalaman" name="pengalaman" value="<?php echo $pengalaman; ?>" disabled><br>
                <!-- Penambahan form deskripsi -->
                <label for="deskripsi">Deskripsi Pengalaman :</label>
                <textarea id="deskripsi" name="deskripsi" disabled><?php echo $deskripsi; ?></textarea><br>
                <!-- <input type="submit" value="Update Data"> -->
            </form>
        <?php
            } else {
                echo "Data pelamar tidak ditemukan.";
            }

            // Menutup koneksi database
            $koneksi->close();
            } else {
                echo "ID pelamar tidak diberikan.";
            }
        ?>
    </div>
</body>
</html>
