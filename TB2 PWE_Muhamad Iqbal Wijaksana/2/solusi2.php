<?php
// Memulai session
session_start();

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FUNCLUB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai parameter dari form
    $kodeAnggota = $_POST["varUSER"];
    $password = $_POST["varPWD"];

    // Mengecek login dengan melakukan cross-check kode anggota dan password di tabel PENGGEMAR
    $sql = "SELECT IDMEMBER, PASSWORD FROM PENGGEMAR WHERE IDMEMBER = '$kodeAnggota' AND PASSWORD = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login sukses
        $row = $result->fetch_assoc();

        // Menyimpan IDMEMBER dan PASSWORD dalam session
        $_SESSION["IDMEMBER"] = $row["IDMEMBER"];
        $_SESSION["PASSWORD"] = $row["PASSWORD"];

        // Mengarahkan ke halaman jacmania.php
        header("Location: jacmania.php");
        exit();
    } else {
        // Login gagal
        // Mengarahkan ke halaman logingagal.php
        header("Location: logingagal.php");
        exit();
    }

    // Menutup koneksi ke database
    $conn->close();
}
?>
