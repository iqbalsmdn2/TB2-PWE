<?php
// Menghapus semua isi cookies
foreach ($_COOKIE as $key => $value) {
    setcookie($key, "", time() - 3600);
}

// Menampilkan barang belanjaan dalam bentuk tabel
echo '<html><head><title>Soal 3 - Solusi3</title></head>';
echo '<body>';
echo '<table border="1">';
echo '<tr><th>NO.</th><th>BARANG BELANJA</th></tr>';

$no = 1;
foreach ($_COOKIE["keranjang"] as $key => $value) {
    echo '<tr><td>' . $no . '</td><td>' . $value . '</td></tr>';
    $no++;
}

echo '</table>';

// Link untuk kembali ke script soal3.php
echo '<a href="soal3.php">Kembali ke Form Belanja</a>';
echo '</body></html>';
?>
