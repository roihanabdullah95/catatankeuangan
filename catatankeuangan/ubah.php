<?php 
session_start();

require 'koneksi.php';

//Ambil data di URL
$id = $_GET["id"];
// queri data mahasiswa berdasarkan id
$uang = query("SELECT * FROM datauang WHERE id = $id") [0] ;

//cek apakah tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])) {
   
    //Cek data apakah berhasil diubah atau tidak
    if(ubah($_POST) > -1) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Keuangan</title>
</head>
<body>
    <h1>Ubah Data Keuangan</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $uang["id"]; ?>">
        <ul>
            <li>
                <label for="pemasukan">Pemasukan    : </label>
                <input type="text" name="pemasukan" id="pemasukan" autocomplete="off" value="<?php echo $uang["pemasukan"]; ?>">
            </li>
            <li>
                <label for="pengeluaran">Pengeluaran    : </label>
                <input type="text" name="pengeluaran" id="pengeluaran" autocomplete="off" value="<?php echo $uang["pengeluaran"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>

</body>
</html>