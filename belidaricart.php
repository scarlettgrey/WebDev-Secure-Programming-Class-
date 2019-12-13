<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("session.php");
    require_once("connect.php");
    if(isset($_SESSION['Username'])){
        $idbarang = $_POST['id'];
        $deletecart = $con->prepare("DELETE FROM addtocart WHERE namapembeli=? AND id=?");
        $deletecart->bind_param("si",$_SESSION['Username'],$idbarang);
        $deletecart->execute();
        echo 'Beli Berhasil';
        echo '<br><a href="index.php">Kembali ke Menu</a>';
    }
    else{
        echo "kamu belum login";
    }
?>