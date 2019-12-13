<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("connect.php");
    require_once("session.php");
    if(isset($_SESSION['Username'])){
        $resultcart = $con->prepare("SELECT id,jumlah,totalharga,gambar FROM addtocart WHERE namapembeli=?");
        $resultcart->bind_param("s",$_SESSION['Username']);
        $resultcart->execute();
        $hasilcart = $resultcart->get_result();
        foreach ($hasilcart as $key) {
            echo '<img src="'.'uploads/'.$key['gambar'].'"><br>';
            echo "Nama: ".$_SESSION['Username'].'<br>';
            echo "jumlah pembelian: ".$key['jumlah'].'<br>';
            echo "total harga: ".$key['totalharga'].'<br>';
            ?>
            <form action="belidaricart.php" method="POST">
                <input type="hidden" name="id" value="<?= $key['id'] ?>">
                <input type='submit' value='Buy Now!'>
            </form>
            <?php
        }
    }

    


?>