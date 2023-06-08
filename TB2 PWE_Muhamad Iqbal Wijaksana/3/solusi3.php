<?php
// Mengecek apakah terdapat cookie keranjang
if(isset($_COOKIE["keranjang"])) {
    // Mendapatkan semua barang belanjaan dari cookie
    $barangBelanjaan = $_COOKIE["keranjang"];

    // Menghitung jumlah barang belanjaan
    $jumlahBarang = count($barangBelanjaan);

    // Membuat tag tabel HTML
    echo "<table border='1'>";
    echo "<tr><th>NO.</th><th>BARANG BELANJA</th></tr>";

    // Menampilkan semua barang belanjaan
    for ($i = 0; $i < $jumlahBarang; $i++) {
        $nomor = $i + 1;
        $barang = $barangBelanjaan[$i];
        echo "<tr><td>$nomor.</td><td>$barang</td></tr>";
    }

    echo "</table>";

    // Menghapus semua isi cookies
    foreach ($_COOKIE["keranjang"] as $cookieName => $cookieValue) {
        setcookie($cookieName, "", time() - 3600);
    }
} else {
    echo "Keranjang belanja kosong.";
}
?>

<a href="soal3.php">Kembali ke Halaman Belanja</a>
