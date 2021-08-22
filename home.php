<?php

    session_start();
    include 'config.php';
    
    if( empty($_SESSION['username']) ){

        header('Location: index.php');
    }
    
?>

<?php

    include_once("config.php");

    $result = mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_barang DESC");
    $hasil = mysqli_query($koneksi, "SELECT * FROM pembelian ORDER BY id_pembelian DESC");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   
</head>
<body class="bg-light">
    <header>
        <div class="container mt-4">
            <ul class="nav justify-content-end">               
                <li class="nav-item">
                    <a class="btn btn-danger" href="logout.php" role="button">LogOut</a>
                </li>
            </ul>    
        </div>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">HOME</h1>
                <hr>
                <p class="lead">Toko Bangunan pak Yanto Merupakan Toko Yang berdiri sejak tahun 2007</p>
            </div>
        </div>
    </header>
    <div class="container mt-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h5 class="card-title">Penjualan</h5>
            </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="alert-secondary">
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Suplayer</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                        <?php
                            
                            while($user_data = mysqli_fetch_array($result)){

                                echo "<tr>";
                                echo "<td>".$user_data['Id_barang']."</td>";
                                echo "<td>".$user_data['nama_barang']."</td>";
                                echo "<td>".$user_data['stock']."</td>";
                                echo "<td> RP. ".$user_data['harga_beli']."</td>";
                                echo "<td> RP. ".$user_data['harga_jual']."</td>";
                                echo "<td>".$user_data['Suplayer']."</td>";
                                echo "<td style='border: 0ch;'><a class='btn btn-primary btn-sm' href='edit.php?id_barang=$user_data[Id_barang]'>Ubah</a> | <a class='btn btn-primary btn-sm' href='delete.php?id_barang=$user_data[Id_barang]'>Hapus</a></td></tr>";
                            }
                        ?>
                </table>
            <div class="card-footer text-muted">
                <a class="btn btn-success btn-lg" href="add.php" role="button">Tambah</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h5 class="card-title">Pembelian</h5>
            </div>
            <table class="table">
            <thead class="thead-dark">
                <tr class="alert-secondary">
                    <th scope="col">ID</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col"></th>
                </tr>
            </thead>
                <?php
                    
                    while($user_data = mysqli_fetch_array($hasil)){

                        echo "<tr>";
                        echo "<td>".$user_data['id_pembelian']."</td>";
                        echo "<td>".$user_data['id_barang']."</td>";
                        echo "<td>".$user_data['jumlah_barang']."</td>";
                        echo "<td style='border: 0ch;'><a class='btn btn-primary btn-sm' href='delete.php?id_pembelian=$user_data[id_pembelian]'>Hapus</a></td></tr>";
                    }
                ?>
        </table>
            <div class="card-footer text-muted">
                <a class="btn btn-success btn-lg" href="addbeli.php" role="button">Tambah</a>
            </div>
        </div>
    </div>
    <br>

   
</body>
</html>