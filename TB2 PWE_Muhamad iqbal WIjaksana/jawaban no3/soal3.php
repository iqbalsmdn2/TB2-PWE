<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["SUBMIT"]) && $_POST["SUBMIT"] === "MASUKKAN KERANJANG") {
		if (isset($_POST["varBELI"])) {
			$jml = 0;
			if (isset($_COOKIE["keranjang"])) {
				$jml = count($_COOKIE["keranjang"]);
			}
			$namacookie = "keranjang[$jml]";
			setcookie($namacookie, $_POST["varBELI"], time() + 60 * 15);
		}
	}
	if (isset($_POST["SUBMIT"]) && $_POST["SUBMIT"] === "SELESAI BELANJA") {
		header("Location: solusi3.php");
		exit();
	}
}
?>
<html>
<head>
	<title>Soal 3</title>
</head>
<body>
	<form method="post" action="soal3.php">
		Pilihan barang yang boleh dibeli :<br>
		<input type="radio" name="varBELI" value="BUKU" checked> BUKU <br>
		<input type="radio" name="varBELI" value="TAS"> TAS <br>
		<input type="radio" name="varBELI" value="PENSIL"> PENSIL <br>
		<input type="radio" name="varBELI" value="DISKET"> DISKET <br>
		<input type="radio" name="varBELI" value="TOPI"> TOPI <br>
		<input type="submit" name="SUBMIT" value="MASUKKAN KERANJANG"> <br>
		<input type="submit" name="SUBMIT" value="SELESAI BELANJA"> <br>
		<?php
		if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["SUBMIT"]) && $_POST["SUBMIT"] === "MASUKKAN KERANJANG") {
			if (isset($_POST["varBELI"])) {
				echo "Barang ke-" . ($jml + 1) . " yang dimasukkan ke keranjang cookie = <strong>" . $_POST["varBELI"] . "</strong>";
			}
		}
		?>
	</form>
</body>
</html>
