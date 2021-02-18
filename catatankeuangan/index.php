<?php 
    session_start();


    if(!isset($_SESSION["login"]) ) {
        header("Location: home.php");
        exit;
    }

    require 'koneksi.php';   
   $uang = query("SELECT * FROM datauang");
  
//    Pemasukan
   $query = "SELECT SUM(pemasukan) AS 'sumuang' FROM datauang";
   $res=mysqli_query($conn, $query);
   $data=mysqli_fetch_array($res);
//    echo "SUM of Uang: ".$data['sumuang'];

// Pengeluaran
$query1 = "SELECT SUM(pengeluaran) AS 'sumuang1' FROM datauang";
$res1=mysqli_query($conn, $query1);
$data1=mysqli_fetch_array($res1);

// Chart Line
// header('Content-Type: application/json');
//    $query_result = mysqli_query($conn , $query);
//    while($data = mysqli_fetch_assoc($query_result)) {
//        $output = "Total Pemasukan"." ".$data['sum'];
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
      .chart-container {
        width: 640px;
        height: auto;
      }
    </style>
</head>

<body>

<a href="logout.php" class="logout"><button>Logout</button></a>


<center>
    <h1>CATATAN KEUANGAN</h1>
    <br>
        <a href="tambah.php"> 
            <button> Input Data Keuangan </button></a>
    <br><br>

    <div id="container">
    <table border = "1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>            
            <th>Pemasukan (Rp)</th>
            <th>Pengeluaran (Rp)</th>
            <!-- <th>Saldo Akhir (Rp)</th> -->
            <th>Aksi Data</th>              
        </tr>
    </thead>
    <tbody>
    
        <?php $i = 1; ?>
    <?php foreach( $uang as $row ) : ?>
    <tr>
    <td align="center"><?php echo $i; ?></td>
    <td align="center" style="font-family:arial; font-size: 17px;"><?php echo"Rp " . number_format($row["pemasukan"]); ?></td>
    <td align="center" style="font-family:arial; font-size: 17px;"><?php echo"Rp " . number_format($row["pengeluaran"]); ?></td>
    <!-- <td align="center" style="font-family:arial; font-size: 17px;"><?php echo"Rp " . number_format($row['pemasukan']-$row['pengeluaran']); ?></td> -->
    <td>
        <a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick=" return confirm ('yakin anda ingin menghapus data?');">Hapus</a>
    </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    <tr>
        <th>Jumlah</th>
        <td align="center" style="font-family:arial; font-size: 17px;"><?php echo "Rp " . number_format(" ".$data['sumuang']); ?></td>
        <td align="center" style="font-family:arial; font-size: 17px;"><?php echo "Rp " . number_format(" ".$data1['sumuang1']); ?></td>
        <th></th>
    </tr>
    <tr>
        <th colspan="1">Saldo Akhir</th>
        <td colspan="2" align="center" style="font-family:arial; font-size: 17px;"><?php echo "Rp " . number_format((" ".$data['sumuang'])-(" ".$data1['sumuang1'])); ?></td>  
        <td></td>      
        
    </tr>
    </table>
    </div> 

</body>
</html>
<br>

<!DOCTYPE html>
<html>
  <head>
    <title>ChartJS - LineGraph</title>
    <style>
      .chart-container {
        width: 640px;
        height: auto;
      }
    </style>
  </head>
  <body>
    <div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    
    <!-- javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/linegraph.js"></script>
  </body>
</html>