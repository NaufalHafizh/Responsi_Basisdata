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

        $id_pembelian = $_POST['id_pembelian'];
        $id_barang = $_POST['id_barang'];
        $jumlah_barang = $_POST['jumlah_barang'];

        $result = mysqli_query($koneksi, "UPDATE pembelian SET id_barang='$id_barang', jumlah_barang='$jumlah_barang', WHERE id_pembelian=$pembelian");
        
        header("Location: home.php");

    }    
?>

<?php

    $id_pembelian = $_GET['id_pembelian'];

    $result = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian = $id_pembelian");

    while($user_data = mysqli_fetch_array($result)){

        $id_barang = $user_data['id_barang'];
        $jumlah_barang = $user_data['jumlah_barang'];
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
            <p class="lead">Ubah Data Seperlunya.</p>
            <hr class="my-4">
            <p>&larr; <a href="home.php">Home</a>
        </div>
        <div class="container">
            <form action="editbeli.php" method="post" name="update_form">
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">ID Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="id_barang" value=<?php echo $id_barang;?> >
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="inputUser" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUser" name="jumlah_barang" value=<?php echo $jumlah_barang;?> >
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="hidden" name="id_pembelian" value=<?php echo $_GET['id_pembelian'];?>>
                        <input type="submit" name="update" class="btn btn-warning" value="Update">  
                    </div>
                </div>

            </form>
        </div>
    </div>
    </form>
</body>
</html>