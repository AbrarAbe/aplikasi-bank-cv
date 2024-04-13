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
        
        // Upload file cv dan foto
        $cvData = file_get_contents($_FILES['cv']['tmp_name']);
        $fotoData = file_get_contents($_FILES['foto']['tmp_name']);

        // Insert file uploads into file_uploads table
        $sql = $koneksi->prepare("INSERT INTO dokumen (cv, foto) VALUES (?, ?)");
        $sql->bind_param("ss", $cvData, $fotoData);
        $sql->execute();
        $fileUploadId = $sql->insert_id;
        $sql->close();

        // Menyiapkan pernyataan SQL untuk menyisipkan data
        $sql = $koneksi->prepare("INSERT INTO data_pelamar (nama, email, alamat, telepon, pendidikan, universitas, pengalaman, deskripsi, cv_id, foto_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // Sambung variabel berdasdarkan tipe data(s=string, i=int)
        $sql->bind_param("ssssssisii", $nama, $email, $alamat, $telepon, $pendidikan, $universitas, $pengalaman, $deskripsi, $fileUploadId, $fileUploadId);
        $sql->execute();

        // Menjalankan pernyataan SQL dan memeriksa keberhasilannya
        if ($sql->affected_rows > 0) {
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