<?php
// Menyisipkan file koneksi ke database
include_once("koneksi.php");

// Periksa apakah form dikirimkan untuk pembaruan data, kemudian alihkan ke homepage setelah pembaruan
if(isset($_POST['update'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $alamat = $_POST['alamat'];
    $tgllhr = $_POST['tgllhr'];

    // Perbarui data mahasiswa
    $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");

    // Alihkan ke homepage untuk menampilkan data yang diperbarui
    header("Location: index.php");
}
?>
<?php
// Menampilkan data terpilih berdasarkan id
// Mendapatkan id dari url
$nim = $_GET['nim'];

// Mengambil data berdasarkan id
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");

while($user_data = mysqli_fetch_array($result)){
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $jkel = $user_data['jkel'];
    $alamat = $user_data['alamat'];
    $tgllhr = $user_data['tgllhr'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Home</a><br><br>
    <form action="edit.php" method="post">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>
        </table>
    </form>
</body>

</html>