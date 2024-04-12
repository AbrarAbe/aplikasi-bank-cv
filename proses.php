<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/abrar.css">
    <title>Form Aplikasi Bank CV Para Programmer</title>
</head>
<body>
    <!-- pemanbahan div -->
    <div class="container">
        <?php
        // Memanggil koneksi ke database
        include('koneksi.db.php');

        // Mengambil data dari form
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $pendidikan = $_POST['pendidikan'];
        $universitas = $_POST['universitas'];
        $pengalaman = $_POST['pengalaman'];
        $deskripsi = $_POST['deskripsi'];

        // Menyiapkan pernyataan SQL untuk menyisipkan data
        $sql = "INSERT INTO data_pelamar (nama, email, alamat, telepon, pendidikan, universitas, pengalaman, deskripsi) VALUES ('$nama', '$email', '$alamat', '$telepon', '$pendidikan', '$universitas', '$pengalaman', '$deskripsi')";

        // Menjalankan pernyataan SQL dan memeriksa keberhasilannya
        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil disimpan ke database. <a class='button' href='index.php' style='margin-left:210px'>Kembali ke halaman Utama</a> <a class='button1' href='view_data.php'>Lihat Data</a>";
            // Redirect ke halaman index.php setelah proses penyimpanan data selesai
        
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }

        // Menutup koneksi database
        $koneksi->close();
        ?>
    </div>
</body>