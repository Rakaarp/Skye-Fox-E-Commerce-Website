<?php 
session_start();
// membuat skrip koneksi
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>

.bg-login{
    background-image: url(../assets/img/loginadmin.jpg);
    background-size: cover;
    background-position: center;
}

</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SKYE & FOX LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #073e65;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="user" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username Admin">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="pass" placeholder="Password">
                                        </div>
                                        <button class="btn" style="background-color: #073e65; color: #ed9696;" name="login">Login</button>
                                        </a>
                                        
                                    </form>
                                    <?php 
                                       if(isset($_POST['login'])){
                                        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                                        $yangcocok = $ambil->num_rows;
                                        if($yangcocok==1){
                                            $_SESSION['admin']=$ambil->fetch_assoc();
                                            echo "<div class='alert alert-info'>Login Sukses</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                        }
                                        else{
                                            echo "<div class='alert alert-danger'>Login Gagal</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }
                                    }
                                    ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="../asstes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="../asstes/js/sb-admin-2.min.js"></script> -->

</body>

</html>