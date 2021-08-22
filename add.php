<?php

    session_start();
    include 'config.php';
    
    if( empty($_SESSION['username']) ){

        header('Location: index.php');
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Add page</title>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
    <div class="container mt-4">
        <h1 class="display-4">Menambah Data</h1>
        <p class="lead">Silahkan masukan data secara sesuai.</p>
        <hr class="my-4">
        <p>&larr; <a href="home.php">Home</a>
    </div>
    </div>
    <div class="container">
        <form role="form" method="post" action="add.php">
            <div class="form-group row mt-2">
                <label for="inputEmail" class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputEmail" name="id_barang">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputUser" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUser" name="nama_barang">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="stock">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="harga_beli">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="harga_jual">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Suplayer</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="Suplayer">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Tamabah" name="submit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
        <?php

            if(isset($_POST['submit'])){

                $id_barang = $_POST['id_barang'];
                $nama_barang = $_POST['nama_barang'];
                $stock = $_POST['stock'];
                $harga_beli = $_POST['harga_beli'];
                $harga_jual = $_POST['harga_jual'];
                $Suplayer = $_POST['Suplayer'];

                include_once("config.php");

                $result = mysqli_query($koneksi, "INSERT INTO penjualan (id_barang, nama_barang, stock, harga_beli, harga_jual, Suplayer) VALUE('$id_barang','$nama_barang', '$stock' ,'$harga_beli' ,'$harga_jual' ,'$Suplayer')");
                
                echo"<br>";
                echo "User added successfully. <a class='btn btn-secondary' href='home.php'>View Users</a>";
            }
        ?>
    </div>
</body>
</html>