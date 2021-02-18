<?php 
//Koneksi Data base
$conn = mysqli_connect("localhost", "root", "", "keuangan");


function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
}



function tambah($data) {
    global $conn;
    
    //Ambil data dari tiap elemen dalam form
    $pemasukan = htmlspecialchars($data["pemasukan"]);
    $pengeluaran = htmlspecialchars($data["pengeluaran"]);
   

     //query iinsert data
     $query = "INSERT INTO datauang VALUES
     ('', '$pemasukan', '$pengeluaran')
     ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM datauang WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $pemasukan = htmlspecialchars($data["pemasukan"]);
    $pengeluaran = htmlspecialchars($data["pengeluaran"]);
    
       //query iinsert data
    $query = "UPDATE datauang SET
             pemasukan = '$pemasukan',
              pengeluaran = '$pengeluaran'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT datauang FROM user WHERE datauang = '$datauang'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                  alert('username sudah terdaftar!')
              </script>";
              return false;
    }

    //cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
                  alert('konfirmasi password tidak sesuai!');
              </script>";
              return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);


}


?>