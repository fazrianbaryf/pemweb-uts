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
    <title>Document</title>

<body>
    <div class="container">
        <div class='row'>
            <div class='col-md-6'>
                <h1 class='text-start'>Data produk</h1>
            </div>
            <div class='col-md-6 text-end mt-3'>
                <a type="button" class="btn btn-primary" href="create.php">Tambah Product</a>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama produk</th>
                            <th>harga</th>
                            <th>gambar produk</th>
                            <th class='text-center'>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['name'];?></td>
                            <td><?=$row['price'];?></td>
                            <td><img src="<?=$row['image'];?>" width="100"></td>
                            <td class='text-center'>
                                <a type="button" class="btn btn-primary" href="<?=$row['image'];?>"
                                    target="_blank">unduh</a>
                                <a type="button" class="btn btn-primary" href="edit.php?id=<?=$row['id'];?>">Edit</a>
                                <a type="button" class="btn btn-primary"
                                    href="./backend/hapus.php?id=<?=$row['id'];?>">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</body>

</html>