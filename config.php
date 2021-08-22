<?php 

    $databaseHost = 'localhost';
    $databaseName = 'tokopakyanto';
    $databaseUsername = 'root';
    $databasePassword = '';

    $koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if($koneksi === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>