<?php
session_start(); 
    //mendapatkan id produk dari URL
    $id_produk = $_GET['id'];

    //jika sudah ada produk di keranjang, maka produk jumlahnya di +1
    if(isset($_SESSION['keranjang'][$id_produk])){
        $_SESSION['keranjang'][$id_produk]+=1;
    }
    //selain itu belum ada di keranjang
    else{
        $_SESSION['keranjang'][$id_produk] = 1;
    }

//larikan ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>