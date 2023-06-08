<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST["varNPM"];
    $photo = $_FILES["varPHOTO"];
    
    // Cek apakah file yang diupload adalah file gambar JPG
    if ($photo["type"] == "image/jpeg" || $photo["type"] == "image/pjpeg") {
        $targetDir = "uploads/"; // Direktori tempat menyimpan file upload
        $targetFile = $targetDir . $npm . ".jpg"; // Path lengkap file yang disimpan
        
        // Pindahkan file upload ke direktori tujuan
        if (move_uploaded_file($photo["tmp_name"], $targetFile)) {
            echo "Sukses upload photo Anda!<br>";
            
            // Tampilkan gambar photo hasil upload
            echo "Photo Anda:<br>";
            echo "<img src='" . $targetFile . "' width='200' height='200'>";
        } else {
            echo "Gagal upload photo!";
        }
    } else {
        echo "File yang diupload harus berformat JPG.";
    }
}
?>
