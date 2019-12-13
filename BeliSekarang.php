<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("connect.php");
    require_once("session.php");
    $namabarang = htmlentities($_POST['name']);
    $token = htmlentities($_POST['token']);
    $harga = htmlentities($_POST['harga']);
    $jumlah = htmlentities($_POST['qty']);
    $namagambar = $_POST['gambarbarang'];
    $totalharga = $harga*$jumlah;
    $pembeli = $_SESSION['Username'];
    $idbarang = $_POST['id'];
    if(isset($token) == $_SESSION['token']){
        if(isset($_SESSION['Username'])){
            if(isset($_POST['buynow']) && !isset($_POST['addtocart'])){
                echo "Harga yang harus dibayarkan ".$totalharga;
            }
            else if(!isset($_POST['buynow']) && isset($_POST['addtocart'])){
                $addtocart = $con->prepare("INSERT INTO addtocart(id,namapembeli,jumlah,totalharga,gambar) 
                                            VALUES (?,?,?,?,?)");
                $addtocart->bind_param("isiis",$idbarang,$pembeli,$jumlah,$totalharga,$namagambar);
                $addtocart->execute();
                echo "Barang Berhasil ditambahkan ke Cart";
                ?>
                <br><a href="index.php">Kembali ke Menu</a>
                <?php
            }
        }
    }
    else{
        echo "Kamu Belum Login";
    }


?>