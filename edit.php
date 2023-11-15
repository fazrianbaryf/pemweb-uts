<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    </script>
    <title>Edit Produk</title>
</head>

<body>

    <?php
        require('./config/db.php');

        if(isset($_GET['id'])) {
            $product_id = $_GET['id'];

            $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $product_id");

            if ($result && $row = mysqli_fetch_assoc($result)) {
    ?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h1 class='text-start'>Tambah Produk</h1>
                <a type="button" class="btn btn-primary" href="show.php">Lihat data produk</a>
            </div>
            <form action="./backend/edit.php" method="post" enctype="multipart/form-data"
                class="row row-cols-lg-auto g-1 align-items-center">
                <div class="col-12">
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="input nama produk"
                            value="<?=$row['name'];?>">
                    </div>
                </div>
                <div class="col-12">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" placeholder="input harga produk"
                            value="<?=$row['price'];?>">
                    </div>
                </div>
                <div class="col-12">
                    <label class="col-sm-2 col-form-label">Foto Pruduk</label>
                    <div class="input-group">
                        <div class="col-12">
                            <p>Gambar Saat Ini: <?=$row['image'];?></p>
                        </div>
                        <div class="col-12">
                            <img src="<?=$row['image'];?>" alt="Gambar Produk" width="100">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="file" class='form-control' name="new_image">
                            <input type="hidden" name="old_image" value="<?=$row['image'];?>">
                            <input type="hidden" name="product_id" value="<?=$product_id;?>">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <input type="submit" class="btn btn-primary" value="simpan" name="edit">
                </div>
            </form>
        </div>
    </div>
    <?php
            } else {
                echo "Produk tidak ditemukan.";
            }
        } else {
            echo "ID produk tidak diberikan.";
        }
    ?>
</body>



</html>