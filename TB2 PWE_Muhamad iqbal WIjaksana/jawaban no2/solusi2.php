<?php
// Membaca nilai parameter dari form HTML
$kodeAnggota = $_POST['varUSER'];
$password = $_POST['varPWD'];

// Menghubungkan ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "funclub";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Memastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Melakukan query untuk melakukan cross-check login
$query = "SELECT * FROM PENGGEMAR WHERE IDMEMBER = '$kodeAnggota' AND PASSWORD = '$password'";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah login berhasil
if (mysqli_num_rows($result) == 1) {
    // Login berhasil, arahkan ke halaman jacmania.php
    session_start();
    $_SESSION['IDMEMBER'] = $kodeAnggota;
    $_SESSION['PASSWORD'] = $password;
    header("Location: jacmania.php");
    exit;
} else {
    // Login gagal, arahkan ke halaman logingagal.php
    header("Location: logingagal.php");
    exit;
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
