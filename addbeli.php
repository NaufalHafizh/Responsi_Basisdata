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
        <h1 class="display-4">Menambah Data Pembalian</h1>
        <p class="lead">Sesuaikan id barang dengan yang ada pada penjualan.</p>
        <hr class="my-4">
        <p>&larr; <a href="home.php">Back</a>
    </div>
    </div>
    <div class="container">
        <form role="form" method="post" action="addbeli.php">
            <div class="form-group row mt-2">
                <label for="inputEmail" class="col-sm-2 col-form-label">ID Pembelian</label>
                <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputEmail" name="id_pembelian">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputUser" class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUser" name="id_barang">
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Barang</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="jumlah_barang">
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

                $id_pembelian = $_POST['id_pembelian'];
                $id_barang = $_POST['id_barang'];
                $jumlah_barang = $_POST['jumlah_barang'];

                include_once("config.php");

                $result = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembelian, id_barang, jumlah_barang) VALUE('$id_pembelian','$id_barang', '$jumlah_barang')");
                
                echo"<br>";
                echo "User added successfully. <a class='btn btn-secondary' href='home.php'>View Users</a>";
            }
        ?>
    </div>
</body>
</html>