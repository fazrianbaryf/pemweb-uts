<?php

require './../config/db.php';

if(isset($_GET['id'])){
    mysqli_query($db_connect, "delete FROM products WHERE id='$_GET[id]'");
    echo "<script>alert('Product Sudah Di Hapus!');</script>";

    // Refresh halaman setelah menampilkan pesan
    echo "<script>window.location.href='../show.php';</script>";
}

?>

