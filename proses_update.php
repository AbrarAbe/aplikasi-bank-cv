<?php
// Memeriksa apakah data yang diperlukan telah diterima dari formulir
if(isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['alamat']) && isset($_POST['telepon']) && isset($_POST['pendidikan']) && isset($_POST['pengalaman'])) {
    // Mendapatkan data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $pendidikan = $_POST['pendidikan'];
    $pengalaman = $_POST['pengalaman'];

    // Memanggil koneksi ke database
    include('koneksi.db.php');

    // Menyiapkan pernyataan SQL untuk mengupdate data
    $sql = "UPDATE data_pelamar SET nama='$nama', email='$email', alamat='$alamat', telepon='$telepon', pendidikan='$pendidikan', pengalaman='$pengalaman' WHERE id='$id'";

    // Menjalankan pernyataan SQL dan memeriksa keberhasilannya
    if ($koneksi->query($sql) === TRUE) {
        // Menutup koneksi database
        $koneksi->close();
        // Mengarahkan pengguna kembali ke halaman view_data.php setelah update berhasil
        header("Location: view_data.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Menutup koneksi database
    $koneksi->close();
} else {
    // Jika data yang diperlukan tidak diterima, tampilkan pesan error
    echo "Data yang diperlukan tidak diterima.";
}
?>
