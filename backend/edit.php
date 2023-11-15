<?php
require './../config/db.php';

if(isset($_POST['edit'])) {
    global $db_connect;

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $old_image = $_POST['old_image'];
    
    if ($_FILES['new_image']['error'] == 0) {
        $image = $_FILES['new_image']['name'];
        $tempImage = $_FILES['new_image']['tmp_name'];

        $randomFilename = time().'-'.md5(rand()).'-'.$image;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$randomFilename;

        $upload = move_uploaded_file($tempImage, $uploadPath);

        if($upload) {
            unlink($_SERVER['DOCUMENT_ROOT'].$old_image);

            $updateQuery = "UPDATE products SET name='$name', price='$price', image='/upload/$randomFilename' WHERE id=$product_id";
            $updateResult = mysqli_query($db_connect, $updateQuery);

            if ($updateResult) {
                // Pesan berhasil 
                echo "<script>alert('Berhasil memperbarui data produk.');</script>";
            } else {
                // Pesan gagal
                echo "<script>alert('Gagal memperbarui data produk: " . mysqli_error($db_connect) . "');</script>";
            }
        } else {
            // Pesan gagal mengupload gambar baru 
            echo "<script>alert('Gagal mengupload gambar baru.');</script>";
        }
    } else {
        // Jika tidak, hanya perbarui data produk 
        $updateQuery = "UPDATE products SET name='$name', price='$price' WHERE id=$product_id";
        $updateResult = mysqli_query($db_connect, $updateQuery);

        if ($updateResult) {
            // Pesan berhasil
            echo "<script>alert('Berhasil memperbarui data produk.');</script>";
        } else {
            // Pesan gagal
            echo "<script>alert('Gagal memperbarui data produk: " . mysqli_error($db_connect) . "');</script>";
        }
    }

    // Refresh halaman setelah menampilkan pesan
    echo "<script>window.location.href='../show.php';</script>";
}
?>
