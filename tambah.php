<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Go To Home</a><br><br>
    <form action="tambah.php" method="post">
        <table width="25%" border="0">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="text" name="tgllhr"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" name="Submit"></td>
            </tr>
        </table>
    </form>
    <?php
    // Perikas jika form dikirimkan, masukkan data ke tabel mahasiswa
    if(isset($_POST['Submit'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jkel = $_POST['jkel'];
        $alamat = $_POST['alamat'];
        $tgllhr = $_POST['tgllhr'];

        // Menyisipkan file koneksi ke database
        include_once("koneksi.php");
        
        // Memasukkan data ke tabel mahasiswa
        $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr) VALUES ('$nim','$nama','$jkel','$alamat','$tgllhr')");
        
        // Menampilkan pesan ketika data mahasiswa berhasil ditambahkan
        echo "Data berhasil disimpan. <a href='index.php'>Lihat Data</a>";
    }
?>
</body>

</html>