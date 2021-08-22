<?php

    include_once("config.php");

    $id_barang = $_GET['id_barang'];

    $result = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_barang = $id_barang");

    header("Location:home.php");

?>

<?php

    include_once("config.php");

    $id_pembelian = $_GET['id_pembelian'];

    $result = mysqli_query($koneksi, "DELETE FROM pembelian WHERE id_pembelian = $id_pembelian");

    header("Location:home.php");

?>