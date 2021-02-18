<?php 
require 'koneksi.php';
//koneksi ke Database
// $conn = mysqli_connect("localhost", "root", "", "keuangan");

//cek apakah tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])) {
    //  
    
    // //query iinsert data
    // $query = "INSERT INTO mahasiswa VALUES
    //         ('', '$nim', '$nama', '$email', '$jurusan', '$gambar')
    //         ";
    // mysqli_query($conn, $query);

    //Cek data apakah berhasil ditambah atau tidak
    if(tambah($_POST) > -1) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    // if(mysqli_affected_rows($conn) > 0 ) {
    //     echo "berhasil";
    // } else {
    //     echo "gagal!";
    //     echo <br>
    //     echo mysqli_error($conn);
    // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
</head>
<body>
    <h1>Tambah Data Keuangan</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
        <tr>
        <td>
            <label for="pemasukan">Pemasukan : </label>
            <input type="text" name="pemasukan" id="pemasukan" autocomplete="off">

        </td>
        </tr>

        <tr>
        <td>
            <label for="pengeluaran">Pengeluaran    : </label>
            <input type="text" name="pengeluaran" id="pengeluaran" autocomplete="off">
        
        </td>
        </tr>

        <tr>
            <button type="submit" name="submit">Tambah Data Keuangan</button>
        </tr>
        </table>                  
    </form>

</body>
</html>