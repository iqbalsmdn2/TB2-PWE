<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kantor";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai parameter dari form
    $goldarah = $_POST["varGOLDARAH"];
    $gajiMin = $_POST["varGAJIMIN"];
    $gajiMax = $_POST["varGAJIMAX"];

    // Menghapus data karyawan berdasarkan parameter
    $sql = "DELETE FROM KARYAWAN WHERE GOLDARAH = '$goldarah' AND GAJI BETWEEN $gajiMin AND $gajiMax";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Menghitung jumlah baris/record yang terhapus
        $jumlahTerhapus = $conn->affected_rows;

        echo "Data karyawan berhasil dihapus. Jumlah data yang terhapus: " . $jumlahTerhapus . "<br>";
    } else {
        echo "Terjadi kesalahan saat menghapus data karyawan: " . $conn->error . "<br>";
    }

    // Menutup koneksi ke database
    $conn->close();
}
?>

<!-- Link untuk kembali ke form hapus karyawan -->
<a href="soal1.php">Kembali ke Form Hapus Karyawan</a>
