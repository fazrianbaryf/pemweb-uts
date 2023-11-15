<?php

require './../config/db.php';

if(isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $randomFilename = time().'-'.md5(rand()).'-'.$image;

    $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$randomFilename;

    $upload = move_uploaded_file($tempImage,$uploadPath);

    if($upload) {
        mysqli_query($db_connect,"INSERT INTO products (name,price,image)
                    VALUES ('$name','$price','/upload/$randomFilename')");
        echo "<script>alert('Berhasil menambah data produk.');</script>";
        echo "<script>window.location.href='../show.php';</script>";
    } else {
        echo "<script>alert('gagal menambahkan data produk');</script>";

        echo "<script>window.location.href='../create.php';</script>";
    }

}