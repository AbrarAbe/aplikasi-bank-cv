<?php
if(isset($_GET['type']) && isset($_GET['id'])) {
    include('koneksi.db.php');

    $type = $_GET['type'];
    $id = $_GET['id'];

    $sql = "SELECT * FROM dokumen WHERE id='$id'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_data = $row[$type];
        
        $extension = 'pdf'; // Default extension for CVs is PDF
       
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $type . '.' . $extension);
        header('Content-Length: ' . strlen($file_data));

        echo $file_data;
    } else {
        echo "File tidak ditemukan.";
    }

    $koneksi->close();
} else {
    echo "Invalid request.";
}
?>