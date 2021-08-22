<?php

   session_start();
    
   include 'config.php';

   if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
            
        $cek = mysqli_num_rows($data);

        if($cek > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location: home.php");
        }else{
            header("location:index.php?pesan=gagal");

        }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        text-align: center;        
        font-size: 17px;
        font-weight: bold;
        padding-left: 70px;
        padding-right: 70px;
    }
</style>
</head>
<body class="bg-light">
    <div class="login-form">
        <form action="index.php" method="post">
            <h2 class="text-center">Log in</h2>       
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="username" placeholder="username" required="required">
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" placeholder="password" required="required">
            </div>
            <div class="form-group mt-3">
                <center><button type="submit" name="login" class="btn btn-primary btn-block">Log in</button></center>
            </div>        
        </form>
    </div>
</body>
</html>