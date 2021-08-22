<?php

    session_start();
    include 'config.php';
    
    if( empty($_SESSION['username']) ){

        header('Location: index.php');
    }
    
?>



<?php

    include_once("config.php");
    if(isset($_POST['update'])){

        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stock = $_POST['stock'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $Suplayer = $_POST['Suplayer'];

        $result = mysqli_query($koneksi, "UPDATE penjualan SET nama_barang='$nama_barang', stock='$stock', harga_beli='$harga_beli', harga_jual='$harga_jual', Suplayer='$Suplayer' WHERE id_barang=$id_barang");
        
        header("Location: home.php");

    }    
?>

<?php

    $id_barang = $_GET['id_barang'];

    $result = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_barang = $id_barang");

    while($user_data = mysqli_fetch_array($result)){

        $nama_barang = $user_data['nama_barang'];
        $stock = $user_data['stock'];
        $harga_beli = $user_data['harga_beli'];
        $harga_jual = $user_data['harga_jual'];
        $Suplayer = $user_data['Suplayer'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penjualan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Mengubah Data</h1>
            <p class="lead">Udah Data Seperlunya.</p>
            <hr class="my-4">
            <p>&larr; <a href="home.php">Home</a>
        </div>
        <div class="container">
            <form action="edit.php" method="post" name="update_form">
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="nama_barang" value=<?php echo $nama_barang;?> >
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="stock" value=<?php echo $stock;?> >
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="harga_beli" value=<?php echo $harga_beli;?> >
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Harga Jual</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="harga_jual" value=<?php echo $harga_jual;?> >
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Suplayer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="Suplayer" value=<?php echo $Suplayer;?> >
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="hidden" name="id_barang" value=<?php echo $_GET['id_barang'];?>>
                        <input type="submit" name="update" class="btn btn-warning" value="Update">  
                    </div>
                </div>

            </form>
        </div>
    </div>
    </form>
</body>
</html>