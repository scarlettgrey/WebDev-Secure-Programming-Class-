<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("connect.php");
    require_once("session.php");
    if(isset($_SESSION['Username'])){
        $idbarang = $_POST['id'];
    
        $resultbeli = $con->query("SELECT * FROM products WHERE id=$idbarang");

        foreach ($resultbeli as $key) {
            echo '<img src="'.'uploads/'.$key['image'].'">'
            ?>
            <br>Nama Produk: <?= $key['name'] ?>
            <br>Harga Produk: <?= $key['price'] ?>
            <form action="BeliSekarang.php" method="post">
                <input type="hidden" name="name" value="<?= $key['name'] ?>">
                <input type="hidden" name="harga" value="<?= $key['price'] ?>">
                <input type="hidden" name="id" value="<?= $idbarang ?>">
                Jumlah pemesanan:<input type="number" name="qty" value=1 min="1" max="'.$key['stock'].'">
                <input type="hidden" name="id" value="<?= $idbarang ?>">
                <input type="hidden" name="gambarbarang" value="<?= $key['image'] ?>">
                <input type="hidden" name="token" value="<?= $_SESSION['token']?>">
                <br><input type="submit" name="buynow" value="Beli Sekarang">
                <input type="submit" name="addtocart" value="Add To Cart">
            </form>
            <?php
        }
    }
    else{
        echo "Kamu Belum Login";
    ?>
        <form action="index.php">
            <input type="submit" value="Kembali">
        </form>
    <?php }
?>