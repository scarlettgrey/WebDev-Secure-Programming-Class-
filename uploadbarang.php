<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Jualan Mu Disini</title>
</head>
<body>
    <?php
        require_once("session.php");
        if(isset($_SESSION['Username'])){
    ?>
            <form action="Douploadbarang.php" method="post" enctype="multipart/form-data">
                Nama Produk: <input type="text" class="namaproduk" name="namabarang" placeholder="maksimal 25 kata" max="25"><br>
                Harga Produk: <input type="text" class="hargaproduk" name="hargabarang"><br>
                Gambar Produk: <input type="file" class="gambarproduk" name="gambarbarang" placeholder="maksimal 1 mb"><br>
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <input type="submit" value="Upload Barang Mu"><br>
            </form>
    <?php
        }
        else{
            echo "Kamu Belum Login :( Silahkan Login Terlebih Dahulu!"
    ?>
            <br><a href="Index.php">Kembali ke Halaman utama</a>
    <?php
        }
    ?>
</body>
</html>