<!DOCTYPE html>
<html>
<head>
	<title>Data Gudang</title>
</head>
<body>
<?php
			error_reporting(E_ALL ^ E_NOTICE);
			$conn = mysqli_connect("localhost","root","","informatika");

			$kodegl = $_POST["kodegl"];

			$kodeg = $_POST["kodeg"];
			$Namag = $_POST["Namag"];
			$lokasi = $_POST["lokasi"];

			$Submit = $_POST["Submit"];
			$Ubah = $_POST["Ubah"];

			if ($Submit) {
				if ($kodeg == "") {
					echo "<h3>kode gudang tidak boleh kosong</h3>";
				} elseif ($Namag == "") {
					echo "<h3>Nama gudang tidak boleh kosong</h3>";
				} elseif ($lokasi == "") {
					echo "<h3>Alamat tidak boleh kosong</h3>";
				} else {
					$insert = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) 
								VALUES ('$kodeg','$Namag','$lokasi')
							";
					mysqli_query($conn, $insert);
					echo "<h3>Data Berhasil Dimasukkan</h3>";
				}
			
			} elseif ($Ubah) {
				if ($kodeg == "") {
					echo "<h3>kode gudang tidak boleh kosong</h3>";
				} elseif ($Namag == "") {
					echo "<h3>Nama gudang tidak boleh kosong</h3>";
				} elseif ($lokasi == "") {
					echo "<h3>Alamat tidak boleh kosong</h3>";
				} else {
					$update = " UPDATE gudang
								SET kode_gudang='$kodeg', nama_gudang='$Namag', lokasi='$lokasi'
								WHERE kode_gudang = '$kodegl'
							";
					mysqli_query($conn, $update);
					echo "<h3>Data Berhasil Diubah</h3>";
				}
			}


			if ($_GET["hps"]) {
				$kodeg = $_GET["hps"];
				$hapus = "DELETE FROM gudang WHERE kode_gudang = '$kodeg'";
				mysqli_query($conn, $hapus);
				echo "<h3>Data berhasil di hapus</h3>";
			
			} elseif ($_GET["ubh"]) {
				$kodeg = $_GET["ubh"]; 
				$cari = "SELECT * FROM gudang WHERE kode_gudang='$kodeg'";
				$hasil = mysqli_query($conn, $cari);
				$data = mysqli_fetch_row($hasil); 
            }
            
		?>

	
		<form method="post" action="tugas2.php">
			<table>
				<tr>
					<td>kode gudang</td>
					<td>:</td>
					<td> 
						<input type="text" name="kodeg" value="<?php echo $data[0] ?>">
						<input type="hidden" name="kodegl" value="<?php echo $data[0] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama gudang</td>
					<td>:</td>
					<td>
						<input type="text" name="Namag" value="<?php echo $data[1] ?>">
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>
						<input type="text" name="lokasi" value="<?php echo $data[2] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($data) {
								echo "<input type='submit' name='Ubah' value='Ubah'>";
							} else {
								echo "<input type='submit' name='Submit' value='Submit'>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>

		<hr>

		<table border="1">
			<tr>
				<td>kode gudang</td>
				<td>Nama gudang</td>
				<td>Alamat</td>
				<td>Aksi</td>
			</tr>
			<?php
				$cari = "SELECT * FROM gudang";
				$hasil = mysqli_query($conn, $cari);
				while ($data = mysqli_fetch_row($hasil)){
					echo "
						<tr>
							<td>$data[0]</td>
							<td>$data[1]</td>
							<td>$data[2]</td>
							<td>
								<a href='tugas2.php?ubh=$data[0]'>Ubah</a>
								<a href='tugas2.php?hps=$data[0]'>Hapus</a>
							</td>
						</tr>
					";
				}
			?>
		</table>
        </br>
        </br>
        </br>

        <!--- tabel dan form database barang -->
		<?php
			$kodebl = $_POST["kodebl"];

			$kodeb = $_POST["kodeb"];
			$Namab = $_POST["Namab"];
			$kg = $_POST["kg"];

			$Submit1 = $_POST["Submit1"];
			$Ubah1 = $_POST["Ubah1"];

			if ($Submit1) {
				if ($kodeb == "") {
					echo "<h3>kode barang tidak boleh kosong</h3>";
				} elseif ($Namab == "") {
					echo "<h3>Nama barang tidak boleh kosong</h3>";
				} elseif ($kg == "") {
					echo "<h3>kode gudang tidak boleh kosong</h3>";
				} else {
					$insert1 = "INSERT INTO barang (kode_barang, nama_barang, kode_gudang) 
								VALUES ('$kodeb','$Namab','$kg')
							";
					mysqli_query($conn, $insert1);
					echo "<h3>Data Berhasil Dimasukkan</h3>";
				}
			
			} elseif ($Ubah1) {
				if ($kodeb == "") {
					echo "<h3>kode barang tidak boleh kosong</h3>";
				} elseif ($Namab == "") {
					echo "<h3>Nama barang tidak boleh kosong</h3>";
				} elseif ($kg == "") {
					echo "<h3>kode gudang tidak boleh kosong</h3>";
				} else {
					$update1 = " UPDATE barang
								SET kode_barang='$kodeb', nama_barang='$Namab', kode_gudang='$kg'
								WHERE kode_barang = '$kodebl'
							";
					mysqli_query($conn, $update1);
					echo "<h3>Data Berhasil Diubah</h3>";
				}
			}


			if ($_GET["hps1"]) {
				$kodeb = $_GET["hps1"];
				$hapus1 = "DELETE FROM barang WHERE kode_barang = '$kodeb'";
				mysqli_query($conn, $hapus1);
				echo "<h3>Data berhasil di hapus</h3>";
			
			} elseif ($_GET["ubh1"]) {
				$kodeb = $_GET["ubh1"]; 
				$cari1 = "SELECT * FROM barang WHERE kode_barang='$kodeb'";
				$hasil1 = mysqli_query($conn, $cari1);
				$data1 = mysqli_fetch_row($hasil1); 
			}
		?>

	
		<form method="post" action="tugas2.php">
			<table>
				<tr>
					<td>kode barang</td>
					<td>:</td>
					<td> 
						<input type="text" name="kodeb" value="<?php echo $data1[0] ?>">
						<input type="hidden" name="kodebl" value="<?php echo $data1[0] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama barang</td>
					<td>:</td>
					<td>
						<input type="text" name="Namab" value="<?php echo $data1[1] ?>">
					</td>
				</tr>
				<tr>
					<td>kode gudang</td>
					<td>:</td>
					<td>
						<input type="text" name="kg" value="<?php echo $data1[2] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($data1) {
								echo "<input type='submit' name='Ubah1' value='Ubah'>";
							} else {
								echo "<input type='submit' name='Submit1' value='Submit'>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>

		<hr>

		<table border="1">
			<tr>
				<td>kode</td>
				<td>Nama</td>
				<td>Alamat</td>
				<td>Aksi</td>
			</tr>
			<?php
				$cari1 = "SELECT * FROM barang";
				$hasil1 = mysqli_query($conn, $cari1);
				while ($data1 = mysqli_fetch_row($hasil1)){
					echo "
						<tr>
							<td>$data1[0]</td>
							<td>$data1[1]</td>
							<td>$data1[2]</td>
							<td>
								<a href='tugas2.php?ubh1=$data1[0]'>Ubah</a>
								<a href='tugas2.php?hps1=$data1[0]'>Hapus</a>
							</td>
						</tr>
					";
				}
			?>
		</table>
</body>
</html>