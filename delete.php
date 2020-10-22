<?php
// Menyisipkan file koneksi ke database
include_once("koneksi.php");

// Mendapatkan id daru URL untuk hapus data
$nim = $_GET['nim'];

// Hapus baris data dari tabel mahasiswa yang diberi id
$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim='$nim'");

// Setelah berhasil menghapus, mengalihkan ke homepage untuk menampilkan daftar data mahasiswa
header("Location:index.php");
?>